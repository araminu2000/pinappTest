<?php


namespace Cegeka\FlandersDriveBundle\Entity\Glossary;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="glossary_standard")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"term", "src", "description", "explanation"})
 */
class GlossaryStandard extends EntityBase
{
    public function __toString()
    {
        return "{$this->getSrc()} - {$this->getTerm()} - {$this->getDescription()}  ({$this->getExplanation()})";
    }

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
     * @JMS\SerializedName("src")
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     * @JMS\Expose
     */
    protected $src;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @JMS\SerializedName("description")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @JMS\SerializedName("explanation")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $explanation;

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $explanation
     * @return $this
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;
        return $this;
    }

    /**
     * @return string
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * @param string $src
     * @return $this
     */
    public function setSrc($src)
    {
        $this->src = $src;
        return $this;
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param string $term
     * @return $this
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    /**
     * @return string
     */
    public function getTerm()
    {
        return $this->term;
    }


} 