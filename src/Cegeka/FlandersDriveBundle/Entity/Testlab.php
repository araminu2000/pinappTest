<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Region;
use Cegeka\FlandersDriveBundle\Interfaces\ExcelInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use FS\SolrBundle\Doctrine\Annotation as Solr;

/**
 * @ORM\Entity
 * @ORM\Table(name="testlab")
 * @ORM\HasLifecycleCallbacks
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"flandersId", "name", "productType", "region", "type", "equipmentType", "certification", "contact"})
 * @Solr\Document()
 */
class Testlab extends EntityBase implements ExcelInterface
{
    /**
     * @var int
     * @Solr\Id
     * @ORM\Column(type="string", name="solr_id", nullable=true)
     */
    protected $solrId;

    public function __construct()
    {
        $this->setSolrId(uniqid('1', true));
    }

    public static function getExportableColumns()
    {
        return [
            'Name',
            'Product Type',
            'Region',
            'Test Type',
            'Equipment Type',
            'Certification',
            'Contact'
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

        if (null !== $this->getRegion()) {
            $this->setRegionSolr($this->getRegion()->getValue());
        }
    }

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserializeHook()
    {
        if (null === $this->getSolrId()) {
            $this->setSolrId(uniqid('1', true));
        }
    }

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $regionSolr = '';

    /**
     * @var string
     * @Solr\Field(type="string")
     */
    protected $productTypeSolr = '';

    /**
     * @var array
     */
    protected $searchBySolrFields = [
        'regions' => 'region_solr',
        'productTypes' => 'product_type_solr',
    ];

    /**
     * @var Region
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Region", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @JMS\SerializedName("reg")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Region")
     */
    protected $region;

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
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", name="type", nullable=true)
     * @JMS\SerializedName("testType")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $type;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", name="certification", nullable=true)
     * @JMS\SerializedName("certif")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $certification;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", name="flanders_id")
     * @JMS\SerializedName("idTestLab")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $flandersId;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", name="equipment_type", nullable=true)
     * @JMS\SerializedName("equipType")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $equipmentType;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", name="name", nullable=true)
     * @JMS\SerializedName("nameTestLab")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $name;

    /**
     * @var string
     * @Solr\Field(type="string")
     * @ORM\Column(type="string", name="contact", nullable=true)
     * @JMS\SerializedName("contact")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $contact;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="testlabs")
     */
    protected $paragraphs;

    public function __toString()
    {
        return $this->getFlandersId();
    }

    /**
     * @param string $certification
     * @return $this
     */
    public function setCertification($certification)
    {
        $this->certification = $certification;
        return $this;
    }

    /**
     * @return string
     */
    public function getCertification()
    {
        return $this->certification;
    }

    /**
     * @param string $contact
     * @return $this
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param string $equipmentType
     * @return $this
     */
    public function setEquipmentType($equipmentType)
    {
        $this->equipmentType = $equipmentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getEquipmentType()
    {
        return $this->equipmentType;
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
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Region $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Region
     */
    public function getRegion()
    {
        return $this->region;
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
     * @param string $regionSolr
     * @return $this
     */
    public function setRegionSolr($regionSolr)
    {
        $this->regionSolr = $regionSolr;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegionSolr()
    {
        return $this->regionSolr;
    }

    /**
     * @return array
     */
    public function getSearchBySolrFields()
    {
        return $this->searchBySolrFields;
    }
}