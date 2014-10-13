<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("releases")
 * @JMS\ExclusionPolicy("all")
 */
class ReleaseCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Release>")
     * @JMS\XmlList(inline = true, entry = "release")
     * @JMS\Expose
     */
    protected $_elements;
}