<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootList")
 * @JMS\ExclusionPolicy("all")
 */
class FlowCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Flow>")
     * @JMS\XmlList(inline = true, entry = "item")
     * @JMS\Expose
     */
    protected $_elements;
} 