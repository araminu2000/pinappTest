<?php


namespace Cegeka\FlandersDriveBundle\Entity\FileStructure;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Cegeka\FlandersDriveBundle\Entity\Flow;
use Cegeka\FlandersDriveBundle\Interfaces\FlowInformationInterface;
use Cegeka\FlandersDriveBundle\View\FlowInformation;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table("structure_file_substructure")
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("sub")
 * @JMS\AccessorOrder("custom", custom = {"type", "mainGraph", "mainFlow", "afterNoId", "afterYesId", "afterId", "scaledTo"})
 */
class Substructure extends EntityBase implements FlowInformationInterface
{
    public function __toString()
    {
        if (null !== $this->getReferencedProcess()) {
            return "{$this->getReferencedProcess()->getFlandersId()} ({$this->getType()})";
        }

        return "New Structure";
    }

    /**
     * @var Group
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\FileStructure\Group", inversedBy="substructures")
     */
    protected $group;

    /**
     * @var string
     * @JMS\SerializedName("refItemId")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     */
    protected $referencedProcessId;

    /**
     * @var string
     * @JMS\SerializedName("after")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $afterId;

    /**
     * @var string
     * @JMS\SerializedName("after_yes")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $afterYesId;

    /**
     * @var string
     * @ORM\Column(type="string", name="scaled_to", nullable=true)
     * @JMS\SerializedName("scaledTo")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $scaledTo;

    /**
     * @var string
     * @JMS\SerializedName("after_no")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $afterNoId;

    /**
     * @var string
     * @ORM\Column(type="string", name="type")
     * @JMS\SerializedName("type")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $type;

    /**
     * @var string
     * @ORM\Column(type="string", name="main_graph")
     * @JMS\SerializedName("maingraph")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $mainGraph;

    /**
     * @var string
     * @ORM\Column(type="string", name="main_flow")
     * @JMS\SerializedName("mainflow")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $mainFlow;

    /**
     * @var Flow
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow", cascade={"persist"})
     * @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     */
    protected $referencedProcess;

    /**
     * @var Flow
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow", cascade={"persist"})
     * @ORM\JoinColumn(name="after_id", referencedColumnName="id")
     */
    protected $afterReference;

    /**
     * @var Flow
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow", cascade={"persist"})
     * @ORM\JoinColumn(name="after_yes_id", referencedColumnName="id")
     */
    protected $afterYesReference;

    /**
     * @var Flow
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow", cascade={"persist"})
     * @ORM\JoinColumn(name="after_no_id", referencedColumnName="id")
     */
    protected $afterNoReference;

    /**
     * @param mixed $afterId
     * @return $this
     */
    public function setAfterId($afterId)
    {
        $this->afterId = $afterId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAfterId()
    {
        return $this->afterId;
    }

    /**
     * @param string $afterNoId
     * @return $this
     */
    public function setAfterNoId($afterNoId)
    {
        $this->afterNoId = $afterNoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAfterNoId()
    {
        return $this->afterNoId;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Flow $afterNoReference
     * @return $this
     */
    public function setAfterNoReference($afterNoReference)
    {
        $this->afterNoReference = $afterNoReference;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Flow
     */
    public function getAfterNoReference()
    {
        return $this->afterNoReference;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Flow $afterReference
     * @return $this
     */
    public function setAfterReference($afterReference)
    {
        $this->afterReference = $afterReference;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Flow
     */
    public function getAfterReference()
    {
        return $this->afterReference;
    }

    /**
     * @param mixed $afterYesId
     * @return $this
     */
    public function setAfterYesId($afterYesId)
    {
        $this->afterYesId = $afterYesId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAfterYesId()
    {
        return $this->afterYesId;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Flow $afterYesReference
     * @return $this
     */
    public function setAfterYesReference($afterYesReference)
    {
        $this->afterYesReference = $afterYesReference;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Flow
     */
    public function getAfterYesReference()
    {
        return $this->afterYesReference;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Flow $referencedProcess
     * @return $this
     */
    public function setReferencedProcess($referencedProcess)
    {
        $this->referencedProcess = $referencedProcess;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Flow
     */
    public function getReferencedProcess()
    {
        return $this->referencedProcess;
    }

    /**
     * @param string $referencedProcessId
     * @return $this
     */
    public function setReferencedProcessId($referencedProcessId)
    {
        $this->referencedProcessId = $referencedProcessId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferencedProcessId()
    {
        return $this->referencedProcessId;
    }

    /**
     * @param string $scaledTo
     * @return $this
     */
    public function setScaledTo($scaledTo)
    {
        $this->scaledTo = $scaledTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getScaledTo()
    {
        return $this->scaledTo;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getMainGraph()
    {
        return $this->mainGraph;
    }

    /**
     * @param string $mainGraph
     * @return $this
     */
    public function setMainGraph($mainGraph)
    {
        if(!is_null($mainGraph)) {
            $mainGraph = "yes";
        }

        $this->mainGraph = $mainGraph;
        return $this;
    }

    /**
     * @return string
     */
    public function getMainFlow()
    {
        return $this->mainFlow;
    }

    /**
     * @param string $mainFlow
     * @return $this
     */
    public function setMainFlow($mainFlow)
    {
        if(!is_null($mainFlow)) {
            $mainFlow = "yes";
        }

        $this->mainFlow = $mainFlow;
        return $this;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\FileStructure\Group $group
     * @return $this
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\FileStructure\Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Decision|\Cegeka\FlandersDriveBundle\Entity\FileStructure|\Cegeka\FlandersDriveBundle\Entity\Step|null
     */
    public function getReferenceObject()
    {
        if ($this->type == 'step') {
            return $this->getReferencedProcess()->getStep();
        }

        if ($this->type == 'decision') {
            return $this->getReferencedProcess()->getDecision();
        }

        if ($this->type == 'flow') {
            return $this->getReferencedProcess()->getFileStructure();
        }

        return null;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        if (!$this->getReferencedProcess()) {
            return '?';
        }

        $result = '';
        if( $this->type == 'step' ) {
            $step = $this->getReferencedProcess()->getStep();
            if( $step ) {
                $result = $step->getTitle();
            }
        }

        if ($this->type == 'decision') {
            $decision = $this->getReferencedProcess()->getDecision();
            if( $decision ) {
                $result = $decision->getTitle();
            }
        }

        if( $this->type == 'flow' ) {
            $result = $this->getReferencedProcess()->getDisplayName();
        }

        return $result;
    }

    /**
     * @return FlowInformation
     */
    public function getFlowInformation()
    {
        if (null === $this->getReferenceObject()) {
            return new FlowInformation();
        }

        return $this->getReferenceObject()->getFlowInformation();
    }

}