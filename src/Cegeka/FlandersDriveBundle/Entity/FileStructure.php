<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\FileStructure\Group;
use Cegeka\FlandersDriveBundle\Entity\FileStructure\Substructure;
use Cegeka\FlandersDriveBundle\Interfaces\FlowInformationInterface;
use Cegeka\FlandersDriveBundle\View\FlowInformation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="structure_file")
 * @ORM\HasLifecycleCallbacks()
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("rootStructure")
 */
class FileStructure extends EntityBase implements FlowInformationInterface
{
    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveHook()
    {
        if (null !== $this->flow) {
            $this->flow->setFileStructure(null);
        }
    }

    /**
     * @var Flow
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow", mappedBy="fileStructure")
     */
    protected $flow;

    public function __toString()
    {
        return "{$this->getSelf()} ({$this->getId()})";
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="file_name", nullable=true)
     */
    protected $fileName;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\FileStructure\Group", mappedBy="structure", cascade={"persist", "remove"})
     * @JMS\Type("ArrayCollection<Cegeka\FlandersDriveBundle\Entity\FileStructure\Group>")
     * @JMS\XmlList(inline = true, entry = "group")
     * @JMS\Expose
     */
    protected $groups;

    /**
     * @var string
     * @ORM\Column(type="string", name="self", nullable=true)
     * @JMS\SerializedName("self")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $self;

    /**
     * @param mixed $group
     * @return $this
     */
    public function setGroups($group)
    {
        $this->groups = $group;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param string $self
     * @return $this
     */
    public function setSelf($self)
    {
        $this->self = $self;
        return $this;
    }

    /**
     * @return string
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @return FlowInformation
     */
    public function getFlowInformation()
    {
        $flowInformation = new FlowInformation();

        /** @var Group $group */
        foreach ($this->getGroups() as $group) {
            /** @var Substructure $substructure */
            foreach ($group->getSubstructures() as $substructure) {
                $flowInformation->merge($substructure->getFlowInformation($flowInformation));
            }
        }

        return $flowInformation;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Flow $flow
     * @return $this
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Flow
     */
    public function getFlow()
    {
        return $this->flow;
    }

} 