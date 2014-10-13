<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("glossary")
 * @JMS\ExclusionPolicy("all")
 */
class Glossary extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryTerm>")
     * @JMS\XmlList(inline = true, entry = "term")
     * @JMS\Expose
     */
    protected $_elements;
} 