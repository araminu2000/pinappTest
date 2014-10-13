<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Scaling;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\ExclusionPolicy("all")
 */
class ActivityCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Scaling\Activity>")
     * @JMS\XmlList(inline = true, entry = "activity")
     * @JMS\Expose
     */
    protected $_elements;
} 