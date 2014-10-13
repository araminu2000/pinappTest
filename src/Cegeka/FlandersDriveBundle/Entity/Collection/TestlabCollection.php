<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootTestLab")
 * @JMS\ExclusionPolicy("all")
 */
class TestlabCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Testlab>")
     * @JMS\XmlList(inline = true, entry = "testLab")
     * @JMS\Expose
     */
    protected $_elements;
} 