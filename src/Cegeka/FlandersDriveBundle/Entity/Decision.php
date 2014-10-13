<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Scaling\Activity;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Process as ProcessEntity;
use Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType;
use Cegeka\FlandersDriveBundle\Interfaces\FlowInformationInterface;
use Cegeka\FlandersDriveBundle\View\FlowInformation;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="decision")
 * @ORM\HasLifecycleCallbacks()
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("decision")
 * @JMS\AccessorOrder("custom", custom = {"process", "activity", "productType", "processOwnerId", "title", "tagYes", "tagNo"})
 */
class Decision extends EntityBase implements FlowInformationInterface
{
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveHook()
    {
        if (null !== $this->flow) {
            $this->flow->setDecision(null);
        }
    }

    /**
     * @var Flow
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow", mappedBy="decision")
     */
    protected $flow;

    /**
     * @var string
     * @ORM\Column(type="string", name="file_name", nullable=true)
     */
    protected $fileName;

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
     * @var Company
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Company")
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
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("title")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(type="string", name="tag_yes")
     * @JMS\SerializedName("tag_yes")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $tagYes;

    /**
     * @var string
     * @ORM\Column(type="string", name="tag_no")
     * @JMS\SerializedName("tag_no")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $tagNo;

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
     * @param ProcessEntity $process
     * @return $this
     */
    public function setProcess($process)
    {
        $this->process = $process;
        return $this;
    }

    /**
     * @return ProcessEntity
     */
    public function getProcess()
    {
        return $this->process;
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
     * @return \Cegeka\FlandersDriveBundle\Entity\Company
     */
    public function getProcessOwner()
    {
        return $this->processOwner;
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
     * @param string $tagNo
     * @return $this
     */
    public function setTagNo($tagNo)
    {
        $this->tagNo = $tagNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getTagNo()
    {
        return $this->tagNo;
    }

    /**
     * @param string $tagYes
     * @return $this
     */
    public function setTagYes($tagYes)
    {
        $this->tagYes = $tagYes;
        return $this;
    }

    /**
     * @return string
     */
    public function getTagYes()
    {
        return $this->tagYes;
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
        return new FlowInformation();
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