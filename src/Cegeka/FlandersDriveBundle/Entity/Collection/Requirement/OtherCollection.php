<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Requirement;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

class OtherCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Requirement\Other>")
     * @JMS\XmlList(inline = true, entry = "refOtherReq")
     */
    protected $_elements;
} 