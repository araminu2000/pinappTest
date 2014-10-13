<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Scaling\Activity;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Process as ProcessEntity;
use Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType;
use Cegeka\FlandersDriveBundle\Interfaces\ExcelInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use FS\SolrBundle\Doctrine\Annotation as Solr;

/**
 * @ORM\Entity
 * @ORM\Table(name="recommendation")
 * @ORM\HasLifecycleCallbacks
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"flandersId", "name", "productType", "process", "activity", "text", "goal", "reference"})
 * @Solr\Document
 */
class Recommendation extends EntityBase implements ExcelInterface
{
    /**
     * @var int
     * @Solr\Id
     * @ORM\Column(type="string", name="solr_id", nullable=true)
     */
    protected $solrId;

    public function __construct() {
        $this->setSolrId(uniqid('5', true));
    }

    public static function getExportableColumns()
    {
        return [
            'Name',
            'Activity',
            'Process',
            'Product Type',
            'Text',
            'Goal',
            'Reference',
        ];
    }

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

    public function setSolrFields()
    {
        if (null !== $this->getProductType()) {
            $this->setProductTypeSolr($this->getProductType()->getValue());
        }

        if (null !== $this->getProcess()) {
            $this->setProcessSolr($this->getProcess()->getValue());
        }

        if (null !== $this->getActivity()) {
            $this->setActivitySolr($this->getActivity()->getValue());
        }
    }

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $activitySolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $processSolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $productTypeSolr = '';

    /**
     * @var array
     */
    protected $searchBySolrFields = [
        'activities' => 'activity_solr',
        'processes' => 'process_solr',
        'productTypes' => 'product_type_solr',
    ];

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserializeHook()
    {
        if (null === $this->getSolrId()) {
            $this->setSolrId(uniqid('5', true));
        }
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="flanders_id", unique=true)
     * @JMS\SerializedName("idRecomm")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Solr\Field(type="string")
     */
    protected $flandersId;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("nameRecomm")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Solr\Field(type="string")
     */
    protected $name;

    /**
     * @var Activity
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Activity", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id")
     * @JMS\SerializedName("act")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Activity")
     */
    protected $activity;

    /**
     * @var ProcessEntity
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Process", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     * @JMS\SerializedName("proc")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Process")
     */
    protected $process;

    /**
     * @var ProductType
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="product_type_id", referencedColumnName="id")
     * @JMS\SerializedName("prodType")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType")
     */
    protected $productType;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @JMS\SerializedName("textRecomm")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Solr\Field(type="string")
     */
    protected $text;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @JMS\SerializedName("goalRecomm")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Solr\Field(type="string")
     */
    protected $goal;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @JMS\SerializedName("refRecomm")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Solr\Field(type="string")
     */
    protected $reference;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="recommendations")
     */
    protected $paragraphs;

    public function __toString()
    {
        return "{$this->getName()} - ({$this->getFlandersId()})";
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Activity $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param string $flandersId
     * @return $this
     */
    public function setFlandersId($flandersId)
    {
        $this->flandersId = $flandersId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlandersId()
    {
        return $this->flandersId;
    }

    /**
     * @param string $goal
     * @return $this
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Process $process
     * @return $this
     */
    public function setProcess($process)
    {
        $this->process = $process;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Process
     */
    public function getProcess()
    {
        return $this->process;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType $productType
     * @return $this
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param string $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param ArrayCollection $paragraphs
     * @return $this
     */
    public function setParagraphs($paragraphs)
    {
        $this->paragraphs = $paragraphs;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getParagraphs()
    {
        return $this->paragraphs;
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
     * @param string $activitySolr
     * @return $this
     */
    public function setActivitySolr($activitySolr)
    {
        $this->activitySolr = $activitySolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivitySolr()
    {
        return $this->activitySolr;
    }

    /**
     * @param string $processSolr
     * @return $this
     */
    public function setProcessSolr($processSolr)
    {
        $this->processSolr = $processSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getProcessSolr()
    {
        return $this->processSolr;
    }

    /**
     * @param string $productTypeSolr
     * @return $this
     */
    public function setProductTypeSolr($productTypeSolr)
    {
        $this->productTypeSolr = $productTypeSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductTypeSolr()
    {
        return $this->productTypeSolr;
    }

    /**
     * @return array
     */
    public function getSearchBySolrFields()
    {
        return $this->searchBySolrFields;
    }
} 