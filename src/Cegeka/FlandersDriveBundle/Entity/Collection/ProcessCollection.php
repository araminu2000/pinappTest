<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="process_collection")
 * @JMS\ExclusionPolicy("all")
 */
class ProcessCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Process>")
     * @JMS\XmlList(inline = true, entry = "item")
     * @JMS\Expose
     */
    protected $_elements;
} 