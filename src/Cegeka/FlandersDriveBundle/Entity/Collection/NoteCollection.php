<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("notepage")
 * @ORM\Entity
 * @ORM\Table(name="note_collection")
 * @JMS\ExclusionPolicy("all")
 */
class NoteCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Note>")
     * @JMS\XmlList(inline = true, entry = "note")
     * @JMS\Expose
     */
    protected $_elements;
} 