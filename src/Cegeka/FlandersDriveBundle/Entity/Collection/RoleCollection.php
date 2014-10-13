<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootRoles")
 * @JMS\ExclusionPolicy("all")
 */
class RoleCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Role>")
     * @JMS\XmlList(inline = true, entry = "person")
     * @JMS\Expose
     */
    protected $_elements;


} 