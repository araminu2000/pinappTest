<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Scaling;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\ExclusionPolicy("all")
 */
class RegionCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Scaling\Region>")
     * @JMS\XmlList(inline = true, entry = "reg")
     * @JMS\Expose
     */
    protected $_elements;
} 