<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection\Step;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\XmlRoot("description")
 * @JMS\ExclusionPolicy("all")
 */
class ParagraphCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type(name="array<Cegeka\FlandersDriveBundle\Entity\Step\Paragraph>")
     * @JMS\XmlList(inline = true, entry = "paragraph")
     * @JMS\Expose
     */
    protected $_elements;
} 