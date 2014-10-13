<?php


namespace Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="symbol_abbreviation_standard")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"type", "description", "unit"})
 */
class SymbolAbbreviationStandard extends EntityBase
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("term")
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     * @JMS\Expose
     */
    protected $term;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("type")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $type;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("description")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("unit")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $unit;

    public function __toString()
    {
        return "{$this->getType()} - {$this->getTerm()} - {$this->getDescription()}  ({$this->getUnit()})";
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $term
     * @return $this
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $unit
     * @return $this
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }


} 