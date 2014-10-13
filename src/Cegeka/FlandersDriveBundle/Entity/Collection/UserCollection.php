<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootUser")
 * @ORM\Entity
 * @ORM\Table(name="user_collection")
 * @JMS\ExclusionPolicy("all")
 */
class UserCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\User>")
     * @JMS\XmlList(inline = true, entry = "user")
     * @JMS\Expose
     */
    protected $_elements;
} 