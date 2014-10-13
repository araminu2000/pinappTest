<?php


namespace Cegeka\FlandersDriveBundle\Entity\Step;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="step_image")
 * @JMS\ExclusionPolicy("all")
 */
class Image extends EntityBase
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("align")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $align;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("alt")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $alt;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("border")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $border;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("hspace")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $hspace;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @JMS\SerializedName("src")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     */
    protected $src;

    public function getFlandersSrc()
    {
        $url = str_replace('images/', '', $this->getSrc());

        return str_replace('../../5_', '/bundles/cegekaflandersdrive/images/', $url);
    }

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="images")
     */
    protected $paragraphs;

    public function __toString()
    {
        return $this->getSrc();
    }

    /**
     * @return string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * @param string $align
     * @return $this
     */
    public function setAlign($align)
    {
        $this->align = $align;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     * @return $this
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * @return string
     */
    public function getBorder()
    {
        return $this->border;
    }

    /**
     * @param string $border
     * @return $this
     */
    public function setBorder($border)
    {
        $this->border = $border;
        return $this;
    }

    /**
     * @return string
     */
    public function getHspace()
    {
        return $this->hspace;
    }

    /**
     * @param string $hspace
     * @return $this
     */
    public function setHspace($hspace)
    {
        $this->hspace = $hspace;
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
     * @param string $src
     * @return $this
     */
    public function setSrc($src)
    {
        $this->src = $src;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $paragraphs
     * @return $this
     */
    public function setParagraphs($paragraphs)
    {
        $this->paragraphs = $paragraphs;
        return $this;
    }

}