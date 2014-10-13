<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Scaling;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\ExclusionPolicy("all")
 */
class ApplicationTypeCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Scaling\ApplicationType>")
     * @JMS\XmlList(inline = true, entry = "applType")
     * @JMS\Expose
     */
    protected $_elements;
} 