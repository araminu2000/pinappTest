<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootRecommendation")
 * @JMS\ExclusionPolicy("all")
 */
class RecommendationCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Recommendation>")
     * @JMS\XmlList(inline = true, entry = "recomm")
     * @JMS\Expose
     */
    protected $_elements;
} 