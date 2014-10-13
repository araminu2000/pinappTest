<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Step;

use Doctrine\Common\Collections\ArrayCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="step_requirement_collection")
 */
class RequirementCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Requirement", mappedBy="collection", cascade={"remove", "persist"})
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Step\Requirement>")
     * @JMS\XmlList(inline = true, entry = "reqs")
     */
    protected $_elements;
} 