<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootGuideline")
 * @JMS\ExclusionPolicy("all")
 */
class GuidelineCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Guideline>")
     * @JMS\XmlList(inline = true, entry = "guideline")
     * @JMS\Expose
     */
    protected $_elements;
} 