<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Interfaces\ExcelInterface;
use Cegeka\FlandersDriveBundle\View\FlowInformation;
use Cegeka\FlandersDriveBundle\Interfaces\FlowInformationInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use FS\SolrBundle\Doctrine\Annotation as Solr;

/**
 * @ORM\Entity
 * @ORM\Table(name="flow")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"flandersId", "name"})
 * @Solr\Document
 */
class Flow extends EntityBase implements FlowInformationInterface, ExcelInterface
{
    public function __toString()
    {
        return "{$this->getName()} - {$this->getFlandersId()} ({$this->getId()})";
    }

    /**
     * @var int
     * @Solr\Id
     * @ORM\Column(type="string", name="solr_id", nullable=true)
     */
    protected $solrId;

    public function __construct()
    {
        $this->setSolrId(uniqid('5', true));
    }

    public static function getExportableColumns() {
        return [
            'Name',
        ];
    }

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
     * @ORM\Column(type="string", name="flanders_id")
     * @JMS\SerializedName("id")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $flandersId;

    /**
     * @var Step
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step", inversedBy="flow", cascade={"persist"})
     */
    protected $step;

    /**
     * @var FileStructure
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\FileStructure", inversedBy="flow", cascade={"persist"})
     */
    protected $fileStructure;

    /**
     * @var Decision
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Decision", inversedBy="flow", cascade={"persist"})
     */
    protected $decision;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Solr\Field(type="string")
     */
    protected $name;

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
     * @param \Cegeka\FlandersDriveBundle\Entity\Step $step
     * @return $this
     */
    public function setStep($step)
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Step
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\FileStructure $fileStructure
     * @return $this
     */
    public function setFileStructure($fileStructure)
    {
        $this->fileStructure = $fileStructure;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\FileStructure
     */
    public function getFileStructure()
    {
        return $this->fileStructure;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Decision $decision
     * @return $this
     */
    public function setDecision($decision)
    {
        $this->decision = $decision;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Decision
     */
    public function getDecision()
    {
        return $this->decision;
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
        if (null !== $this->getFileStructure()) {
            return $this->fileStructure->getFlowInformation();
        }

        return null;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        $fileStructure = $this->getFileStructure();
        if ($fileStructure) {
            return $fileStructure->getGroups()->first()->getName();
        }

        return '?';
    }

}