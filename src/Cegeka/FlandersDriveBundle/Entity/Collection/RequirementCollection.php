<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootRequirement")
 * @ORM\Entity
 * @ORM\Table(name="requirement_collection")
 * @JMS\ExclusionPolicy("all")
 */
class RequirementCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Requirement>")
     * @JMS\XmlList(inline = true, entry = "req")
     * @JMS\Expose
     */
    protected $_elements;
} 