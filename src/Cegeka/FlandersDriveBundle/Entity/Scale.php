<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ActivityCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ApplicationTypeCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\BodyCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProcessCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProductTypeCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\RegionCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\StandardCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\XmlRoot("root")
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema-instance", prefix="xsi")
 * @JMS\AccessorOrder("custom", custom = {"productTypeCollection", "processCollection", "standardCollection", "bodyCollection", "regionCollection", "activityCollection", "applicationTypeCollection"})
 */
class Scale extends EntityBase
{
    /**
     * @var ActivityCollection
     * @JMS\SerializedName("scalingActivity")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ActivityCollection")
     */
    protected $activityCollection;

    /**
     * @var ApplicationTypeCollection
     * @JMS\SerializedName("scalingApplType")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ApplicationTypeCollection")
     */
    protected $applicationTypeCollection;

    /**
     * @var BodyCollection
     * @JMS\SerializedName("scalingBody")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\BodyCollection")
     */
    protected $bodyCollection;

    /**
     * @var ProcessCollection
     * @JMS\SerializedName("scalingProc")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProcessCollection")
     */
    protected $processCollection;

    /**
     * @var ProductTypeCollection
     * @JMS\SerializedName("scalingProdType")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProductTypeCollection")
     */
    protected $productTypeCollection;

    /**
     * @var RegionCollection
     * @JMS\SerializedName("scalingReg")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\RegionCollection")
     */
    protected $regionCollection;

    /**
     * @var StandardCollection
     * @JMS\SerializedName("scalingStd")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\StandardCollection")
     */
    protected $standardCollection;

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ActivityCollection $activityCollection
     * @return $this
     */
    public function setActivityCollection($activityCollection)
    {
        $this->activityCollection = $activityCollection;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ActivityCollection
     */
    public function getActivityCollection()
    {
        return $this->activityCollection;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ApplicationTypeCollection $applicationTypeCollection
     * @return $this
     */
    public function setApplicationTypeCollection($applicationTypeCollection)
    {
        $this->applicationTypeCollection = $applicationTypeCollection;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ApplicationTypeCollection
     */
    public function getApplicationTypeCollection()
    {
        return $this->applicationTypeCollection;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\BodyCollection $bodyCollection
     * @return $this
     */
    public function setBodyCollection($bodyCollection)
    {
        $this->bodyCollection = $bodyCollection;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\BodyCollection
     */
    public function getBodyCollection()
    {
        return $this->bodyCollection;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProcessCollection $processCollection
     * @return $this
     */
    public function setProcessCollection($processCollection)
    {
        $this->processCollection = $processCollection;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProcessCollection
     */
    public function getProcessCollection()
    {
        return $this->processCollection;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProductTypeCollection $productTypeCollection
     * @return $this
     */
    public function setProductTypeCollection($productTypeCollection)
    {
        $this->productTypeCollection = $productTypeCollection;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProductTypeCollection
     */
    public function getProductTypeCollection()
    {
        return $this->productTypeCollection;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\RegionCollection $regionCollection
     * @return $this
     */
    public function setRegionCollection($regionCollection)
    {
        $this->regionCollection = $regionCollection;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\RegionCollection
     */
    public function getRegionCollection()
    {
        return $this->regionCollection;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\StandardCollection $standardCollection
     * @return $this
     */
    public function setStandardCollection($standardCollection)
    {
        $this->standardCollection = $standardCollection;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\StandardCollection
     */
    public function getStandardCollection()
    {
        return $this->standardCollection;
    }
} 