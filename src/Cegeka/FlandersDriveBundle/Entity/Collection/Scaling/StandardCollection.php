<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Scaling;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\ExclusionPolicy("all")
 */
class StandardCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Scaling\Tag>")
     * @JMS\XmlList(inline = true, entry = "stdTag")
     * @JMS\Expose
     */
    protected $_elements;
} 