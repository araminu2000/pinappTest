<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootComponent")
 * @JMS\ExclusionPolicy("all")
 */
class ComponentCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Component>")
     * @JMS\XmlList(inline = true, entry = "component")
     * @JMS\Expose
     */
    protected $_elements;
} 