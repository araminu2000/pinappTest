<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Scaling\ApplicationType;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Body;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Process as ProcessEntity;
use Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Region;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Tag;
use Cegeka\FlandersDriveBundle\Interfaces\ExcelInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use FS\SolrBundle\Doctrine\Annotation as Solr;

/**
 * @ORM\Entity
 * @ORM\Table(name="requirement")
 * @ORM\HasLifecycleCallbacks
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"scalingBody", "tag", "scalingTag", "part", "title", "scalingApplicationType", "scalingProductType", "scalingProcess", "scalingRegion", "oblig", "legislation", "type", "subType", "testType", "clauseType", "chapterNumber", "chapterTitle", "clauseNumber", "clauseTitle", "clauseContent", "addInfo"})
 * @Solr\Document
 */
class Requirement extends EntityBase implements ExcelInterface
{
    public function __toString()
    {
        return "{$this->getTag()} - {$this->getPart()} - {$this->getTitle()} - {$this->getChapterNumber()} - {$this->getClauseNumber()}";
    }

    public static function getExportableColumns()
    {
        return [
            'Body',
            'Tag',
            'Scaling Tag',
            'Part',
            'Title',
            'Application Type',
            'Product Type',
            'Region',
            'Obligation',
            'Legislation',
            'Type',
            'Subtype',
            'Test Type',
            'Clause Type',
            'Chapter Number',
            'Chapter Title',
            'Clause Number',
            'Clause Title',
            'Clause Content',
            'Additional Info',
        ];
    }

    /**
     * @var int
     * @Solr\Id
     * @ORM\Column(type="string", name="solr_id", nullable=true)
     */
    protected $solrId;

    public function __construct() {
        $this->setSolrId(uniqid('3', true));
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
        if (null !== $this->getScalingBody()) {
            $this->setScalingBodySolr($this->getScalingBody()->getValue());
        }

        if (null !== $this->getScalingTag()) {
            $this->setScalingTagSolr($this->getScalingTag()->getValue());
        }

        if (null !== $this->getScalingApplicationType()) {
            $this->setScalingApplicationTypeSolr($this->getScalingApplicationType()->getValue());
        }

        if (null !== $this->getScalingProductType()) {
            $this->setScalingProductTypeSolr($this->getScalingProductType()->getValue());
        }

        if (null !== $this->getScalingProcess()) {
            $this->setScalingProcessSolr($this->getScalingProcess()->getValue());
        }

        if (null !== $this->getScalingRegion()) {
            $this->setScalingRegionSolr($this->getScalingRegion()->getValue());
        }
    }

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserializeHook()
    {
        if (null === $this->getSolrId()) {
            $this->setSolrId(uniqid('3', true));
        }
    }

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $scalingBodySolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $scalingTagSolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $scalingApplicationTypeSolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $scalingProductTypeSolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $scalingProcessSolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $scalingRegionSolr = '';

    /**
     * @var array
     */
    protected $searchBySolrFields = [
        'bodies' => 'scaling_body_solr',
        'tags' => 'scaling_tag_solr',
        'applicationTypes' => 'scaling_application_type_solr',
        'productTypes' => 'scaling_product_type_solr',
        'processes' => 'scaling_process_solr',
        'regions' => 'scaling_region_solr',
    ];

    /**
     * @var Body
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Body", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="body_id", referencedColumnName="id")
     * @JMS\SerializedName("stdBody")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Body")
     */
    protected $scalingBody;

    /**
     * @var Tag
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Tag", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     * @JMS\SerializedName("std")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Tag")
     */
    protected $scalingTag;

    /**
     * @var ApplicationType
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\ApplicationType", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="application_type_id", referencedColumnName="id")
     * @JMS\SerializedName("applType")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\ApplicationType")
     */
    protected $scalingApplicationType;

    /**
     * @var ProductType
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="product_type_id", referencedColumnName="id")
     * @JMS\SerializedName("prodType")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType")
     */
    protected $scalingProductType;

    /**
     * @var ProcessEntity
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Process", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     * @JMS\SerializedName("proc")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Process")
     */
    protected $scalingProcess;

    /**
     * @var Region
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Region", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @JMS\SerializedName("reg")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Region")
     */
    protected $scalingRegion;

    /**
     * @var string
     * @ORM\Column(type="string", name="flanders_tag")
     * @JMS\SerializedName("stdTag")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $tag;

    /**
     * @var string
     * @ORM\Column(type="string", name="clause_title", nullable=true)
     * @JMS\SerializedName("clauseTitle")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $clauseTitle;

    /**
     * @var string
     * @ORM\Column(type="string", name="chapter_number")
     * @JMS\SerializedName("chapterNo")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $chapterNumber;

    /**
     * @var string
     * @ORM\Column(type="string", name="test_type", nullable=true)
     * @JMS\SerializedName("testType")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $testType;

    /**
     * @var string
     * @ORM\Column(type="string", name="oblig", nullable=true)
     * @JMS\SerializedName("oblig")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $oblig;

    /**
     * @var string
     * @ORM\Column(type="string", name="chapter_title", nullable=true)
     * @JMS\SerializedName("chapterTitle")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $chapterTitle;

    /**
     * @var string
     * @ORM\Column(type="text", name="add_info", nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     * @JMS\SerializedName("addInfo")
     * @JMS\XmlElement(cdata=false)
     * @Solr\Field(type="string")
     */
    protected $addInfo;

    /**
     * @var string
     * @ORM\Column(type="string", name="part")
     * @JMS\SerializedName("part")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $part;

    /**
     * @var string
     * @ORM\Column(type="string", name="title", nullable=true)
     * @JMS\SerializedName("stdTitle")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(type="string", name="clause_number")
     * @JMS\SerializedName("clauseNo")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $clauseNumber;

    /**
     * @var string
     * @ORM\Column(type="string", name="clause_type", nullable=true)
     * @JMS\SerializedName("clauseType")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $clauseType;

    /**
     * @var string
     * @ORM\Column(type="string", name="type", nullable=true)
     * @JMS\SerializedName("reqType")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $type;

    /**
     * @var string
     * @ORM\Column(type="string", name="subtype", nullable=true)
     * @JMS\SerializedName("reqSubType")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $subType;

    /**
     * @var string
     * @ORM\Column(type="string", name="legislation", nullable=true)
     * @JMS\SerializedName("legislation")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type("string")
     * @Solr\Field(type="string")
     */
    protected $legislation;

    /**
     * @var string
     * @ORM\Column(type="text", name="clause_content", nullable=true)
     * @JMS\Expose
     * @JMS\Type("string")
     * @JMS\SerializedName("clauseContent")
     * @JMS\XmlElement(cdata=true)
     * @Solr\Field(type="string")
     */
    protected $clauseContent;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="requirements")
     */
    protected $paragraphs;

    /**
     * @param string $addInfo
     * @return $this
     */
    public function setAddInfo($addInfo)
    {
        $this->addInfo = $addInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddInfo()
    {
        return $this->addInfo;
    }

    /**
     * @param string $chapterNumber
     * @return $this
     */
    public function setChapterNumber($chapterNumber)
    {
        $this->chapterNumber = $chapterNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getChapterNumber()
    {
        return $this->chapterNumber;
    }

    /**
     * @param string $chapterTitle
     * @return $this
     */
    public function setChapterTitle($chapterTitle)
    {
        $this->chapterTitle = $chapterTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getChapterTitle()
    {
        return $this->chapterTitle;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Requirement\ClauseContent
     * @return $this
     */
    public function setClauseContent($clauseContent)
    {
        $this->clauseContent = $clauseContent;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Requirement\ClauseContent
     */
    public function getClauseContent()
    {
        return $this->clauseContent;
    }

    /**
     * @param string $clauseNumber
     * @return $this
     */
    public function setClauseNumber($clauseNumber)
    {
        $this->clauseNumber = $clauseNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getClauseNumber()
    {
        return $this->clauseNumber;
    }

    /**
     * @param string $clauseTitle
     * @return $this
     */
    public function setClauseTitle($clauseTitle)
    {
        $this->clauseTitle = $clauseTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getClauseTitle()
    {
        return $this->clauseTitle;
    }

    /**
     * @param string $clauseType
     * @return $this
     */
    public function setClauseType($clauseType)
    {
        $this->clauseType = $clauseType;
        return $this;
    }

    /**
     * @return string
     */
    public function getClauseType()
    {
        return $this->clauseType;
    }

    /**
     * @param string $legislation
     * @return $this
     */
    public function setLegislation($legislation)
    {
        $this->legislation = $legislation;
        return $this;
    }

    /**
     * @return string
     */
    public function getLegislation()
    {
        return $this->legislation;
    }

    /**
     * @param string $oblig
     * @return $this
     */
    public function setOblig($oblig)
    {
        $this->oblig = $oblig;
        return $this;
    }

    /**
     * @return string
     */
    public function getOblig()
    {
        return $this->oblig;
    }

    /**
     * @param string $part
     * @return $this
     */
    public function setPart($part)
    {
        $this->part = $part;
        return $this;
    }

    /**
     * @return string
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\ApplicationType $scalingApplicationType
     * @return $this
     */
    public function setScalingApplicationType($scalingApplicationType)
    {
        $this->scalingApplicationType = $scalingApplicationType;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\ApplicationType
     */
    public function getScalingApplicationType()
    {
        return $this->scalingApplicationType;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Body $scalingBody
     * @return $this
     */
    public function setScalingBody($scalingBody)
    {
        $this->scalingBody = $scalingBody;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Body
     */
    public function getScalingBody()
    {
        return $this->scalingBody;
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
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Process
     */
    public function getScalingProcess()
    {
        return $this->scalingProcess;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType $scalingProductType
     * @return $this
     */
    public function setScalingProductType($scalingProductType)
    {
        $this->scalingProductType = $scalingProductType;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType
     */
    public function getScalingProductType()
    {
        return $this->scalingProductType;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Region $scalingRegion
     * @return $this
     */
    public function setScalingRegion($scalingRegion)
    {
        $this->scalingRegion = $scalingRegion;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Region
     */
    public function getScalingRegion()
    {
        return $this->scalingRegion;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Tag $scalingTag
     * @return $this
     */
    public function setScalingTag($scalingTag)
    {
        $this->scalingTag = $scalingTag;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Tag
     */
    public function getScalingTag()
    {
        return $this->scalingTag;
    }

    /**
     * @param string $subType
     * @return $this
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $testType
     * @return $this
     */
    public function setTestType($testType)
    {
        $this->testType = $testType;
        return $this;
    }

    /**
     * @return string
     */
    public function getTestType()
    {
        return $this->testType;
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
     * @param string $scalingApplicationTypeSolr
     * @return $this
     */
    public function setScalingApplicationTypeSolr($scalingApplicationTypeSolr)
    {
        $this->scalingApplicationTypeSolr = $scalingApplicationTypeSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getScalingApplicationTypeSolr()
    {
        return $this->scalingApplicationTypeSolr;
    }

    /**
     * @param string $scalingBodySolr
     * @return $this
     */
    public function setScalingBodySolr($scalingBodySolr)
    {
        $this->scalingBodySolr = $scalingBodySolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getScalingBodySolr()
    {
        return $this->scalingBodySolr;
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
     * @param string $scalingProductTypeSolr
     * @return $this
     */
    public function setScalingProductTypeSolr($scalingProductTypeSolr)
    {
        $this->scalingProductTypeSolr = $scalingProductTypeSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getScalingProductTypeSolr()
    {
        return $this->scalingProductTypeSolr;
    }

    /**
     * @param string $scalingRegionSolr
     * @return $this
     */
    public function setScalingRegionSolr($scalingRegionSolr)
    {
        $this->scalingRegionSolr = $scalingRegionSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getScalingRegionSolr()
    {
        return $this->scalingRegionSolr;
    }

    /**
     * @param string $scalingTagSolr
     * @return $this
     */
    public function setScalingTagSolr($scalingTagSolr)
    {
        $this->scalingTagSolr = $scalingTagSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getScalingTagSolr()
    {
        return $this->scalingTagSolr;
    }

    /**
     * @return array
     */
    public function getSearchBySolrFields()
    {
        return $this->searchBySolrFields;
    }
} 