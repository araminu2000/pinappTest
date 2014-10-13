<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("root")
 * @JMS\ExclusionPolicy("all")
 */
class MaterialCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Material>")
     * @JMS\XmlList(inline = true, entry = "material")
     * @JMS\Expose
     */
    protected $_elements;
} 