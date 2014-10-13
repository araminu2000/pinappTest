<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Scaling\Process;
use Cegeka\FlandersDriveBundle\Entity\Step\Paragraph;
use Cegeka\FlandersDriveBundle\Interfaces\ExcelInterface;
use Cegeka\FlandersDriveBundle\Interfaces\FlowInformationInterface;
use Cegeka\FlandersDriveBundle\View\FlowInformation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use FS\SolrBundle\Doctrine\Annotation as Solr;

/**
 * @ORM\Entity
 * @ORM\Table(name="step")
 * @ORM\HasLifecycleCallbacks
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"processOwnerId", "scalingProcess", "title", "description"})
 * @JMS\XmlRoot("step")
 * @Solr\Document
 */
class Step extends EntityBase implements FlowInformationInterface, ExcelInterface
{
    public function __construct()
    {
        $this->description = new ArrayCollection();
        $this->setSolrId(uniqid('6', true));
    }

    public static function getExportableColumns()
    {
        return [
            'Title',
            'Scaling Process',
            'Process Owner',
        ];
    }


    /**
     * @var int
     * @Solr\Id
     * @ORM\Column(type="string", name="solr_id", nullable=true)
     */
    protected $solrId;

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdateHook()
    {
        parent::preUpdateHook();
        $this->setSolrFields();
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersistHook()
    {
        parent::prePersistHook();
        $this->setSolrFields();
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveHook()
    {
        if (null !== $this->flow) {
            $this->flow->setStep(null);
        }
    }

    /**
     * @var Flow
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow", mappedBy="step")
     */
    protected $flow;

    public function setSolrFields()
    {
        if (null !== $this->getScalingProcess()) {
            $this->setScalingProcessSolr($this->getScalingProcess()->getValue());
        }
    }

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $scalingProcessSolr = '';

    /**
     * @var array
     */
    protected $searchBySolrFields = [
        'processes' => 'scaling_process_solr',
    ];

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserializeHook()
    {
        if (null === $this->getSolrId()) {
            $this->setSolrId(uniqid('6', true));
        }
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="file_name", nullable=true)
     */
    protected $fileName;

    /**
     * @var Company
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Company", inversedBy="steps", cascade={"persist"})
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * @Assert\NotNull
     */
    protected $processOwner;

    /**
     * @var string
     * @JMS\SerializedName("processOwner")
     * @JMS\Expose
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     */
    protected $processOwnerId;

    /**
     * @var Process $scalingProcess
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Process", cascade={"persist"})
     * @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     * @JMS\SerializedName("proc")
     * @JMS\Expose
     * @JMS\Type("Cegeka\FlandersDriveBundle\Entity\Scaling\Process")
     */
    protected $scalingProcess;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("title")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Solr\Field(type="string")
     */
    protected $title;

    /**
     * @var ArrayCollection $description
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="step", cascade={"persist", "remove"})
     * @JMS\SerializedName("description")
     * @JMS\Type("Cegeka\FlandersDriveBundle\Entity\Collection\Step\ParagraphCollection")
     * @JMS\Expose
     */
    protected $description;


    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Company
     */
    public function getProcessOwner()
    {
        return $this->processOwner;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Company $processOwner
     * @return $this
     */
    public function setProcessOwner($processOwner)
    {
        $this->processOwner = $processOwner;
        return $this;
    }

    /**
     * @param string $processOwnerId
     * @return $this
     */
    public function setProcessOwnerId($processOwnerId)
    {
        $this->processOwnerId = $processOwnerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProcessOwnerId()
    {
        return $this->processOwnerId;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Process
     */
    public function getScalingProcess()
    {
        return $this->scalingProcess;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Process $scalingProcess
     * @return $this
     */
    public function setScalingProcess($scalingProcess)
    {
        $this->scalingProcess = $scalingProcess;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * return \Cegeka\FlandersDriveBundle\Entity\Collection\ParagraphCollection $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Step\ParagraphCollection $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
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
     * @param int $solrId
     * @return $this
     */
    public function setSolrId($solrId)
    {
        $this->solrId = $solrId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSolrId()
    {
        return $this->solrId;
    }

    /**
     * @return FlowInformation
     */
    public function getFlowInformation()
    {
        $flowInformation = new FlowInformation();

        /** @var Paragraph $paragraph */
        foreach ($this->description as $paragraph) {
            $flowInformation->addRequirements($paragraph->getRequirements()->toArray());
            $flowInformation->addRecommendations($paragraph->getRecommendations()->toArray());
            $flowInformation->addMaterials($paragraph->getMaterials()->toArray());
            $flowInformation->addComponents($paragraph->getComponents()->toArray());
            $flowInformation->addTestlabs($paragraph->getTestLabs()->toArray());

            if (null !== $paragraph->getImages()) {
                $flowInformation->addImages($paragraph->getImages()->toArray());
            }

            if (null !== $paragraph->getLinkFlowSteps()) {
                $flowInformation->addLinkFlowSteps($paragraph->getLinkFlowSteps()->toArray());
            }

            if (null !== $paragraph->getWorkProducts()) {
                $flowInformation->addWorkproducts($paragraph->getWorkProducts()->toArray());
            }

            if (null !== $paragraph->getInputs()) {
                $flowInformation->addInputs($paragraph->getInputs()->toArray());
            }
        }

        return $flowInformation;
    }

    /**
     * @param string $scalingProcessSolr
     * @return $this
     */
    public function setScalingProcessSolr($scalingProcessSolr)
    {
        $this->scalingProcessSolr = $scalingProcessSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getScalingProcessSolr()
    {
        return $this->scalingProcessSolr;
    }

    /**
     * @return array
     */
    public function getSearchBySolrFields()
    {
        return $this->searchBySolrFields;
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