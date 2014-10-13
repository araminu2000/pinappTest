<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Scaling;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\ExclusionPolicy("all")
 */
class ProcessCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Scaling\Process>")
     * @JMS\XmlList(inline = true, entry = "proc")
     * @JMS\Expose
     */
    protected $_elements;
} 