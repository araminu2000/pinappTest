<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Requirement;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\XmlRoot("addInfo")
 */
class AddInfoCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Requirement\AddInfo>")
     * @JMS\XmlList(inline = true, entry = "link_flow_step_addInfo")
     */
    protected $_elements;
} 