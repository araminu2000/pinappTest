<?php


namespace Cegeka\FlandersDriveBundle\Entity;

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
 * @ORM\Table(name="component")
 * @ORM\HasLifecycleCallbacks
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"flandersId", "name", "productType", "process", "effect", "improve", "reference"})
 * @Solr\Document()
 */
class Component extends EntityBase implements ExcelInterface
{
    /**
     * @var int
     * @Solr\Id
     * @ORM\Column(type="string", name="solr_id", nullable=true)
     */
    protected $solrId;

    public function __construct()
    {
        $this->setSolrId(uniqid('2', true));
    }

    public static function getExportableColumns()
    {
        return [
            'Name',
            'Reference',
            'Effect',
            'Improve',
            'Process',
            'Product Type',
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
    }

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserializeHook()
    {
        if (null === $this->getSolrId()) {
            $this->setSolrId(uniqid('2', true));
        }
    }

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $productTypeSolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $processSolr = '';

    /**
     * @var array
     */
    protected $searchBySolrFields = [
        'productTypes' => 'product_type_solr',
        'processes' => 'process_solr',
    ];

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", name="flanders_id")
     * @JMS\SerializedName("idComp")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $flandersId;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("nameComp")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $name;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("refComp")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $reference;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("effectComp")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $effect;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("improveComp")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $improve;

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
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="components")
     */
    protected $paragraphs;

    public function __toString()
    {
        return "{$this->getName()} - {$this->getFlandersId()}";
    }

    /**
     * @param string $effect
     * @return $this
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;
        return $this;
    }

    /**
     * @return string
     */
    public function getEffect()
    {
        return $this->effect;
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
     * @param string $improve
     * @return $this
     */
    public function setImprove($improve)
    {
        $this->improve = $improve;
        return $this;
    }

    /**
     * @return string
     */
    public function getImprove()
    {
        return $this->improve;
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