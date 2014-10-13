<?php


namespace Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation;

use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("symbols_abbreviations")
 * @JMS\ExclusionPolicy("all")
 */
class SymbolAbbreviationCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationTerm>")
     * @JMS\XmlList(inline = true, entry = "term")
     * @JMS\Expose
     */
    protected $_elements;
} 