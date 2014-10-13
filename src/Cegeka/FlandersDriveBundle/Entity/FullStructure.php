<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\FileStructure\Group;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="structure_full")
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("structure")
 * @JMS\AccessorOrder("custom", custom = {"self", "groups"})
 */
class FullStructure extends EntityBase
{
    public function __toString()
    {
        return "{$this->getSelf()} ({$this->getId()})";
    }

    public function __construct() {
        $this->groups = new ArrayCollection();
    }

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\FullStructure\Group", mappedBy="structure", cascade={"persist", "remove"})
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\FullStructure\Group>")
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


} 