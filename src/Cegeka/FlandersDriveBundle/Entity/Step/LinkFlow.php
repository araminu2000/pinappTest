<?php


namespace Cegeka\FlandersDriveBundle\Entity\Step;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="step_link_flow")
 * @JMS\ExclusionPolicy("all")
 */
class LinkFlow extends EntityBase
{
    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlValue(cdata=false)
     * @JMS\XmlAttribute
     * @JMS\SerializedName("flow_step_href")
     */
    protected $href;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlValue(cdata=false)
     */
    protected $value;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="linkFlowSteps")
     */
    protected $paragraphs;

    public function __toString()
    {
        return "{$this->getValue()} - {$this->getHref()}";
    }


    public function getFlandersUrlForHref()
    {
        $url = str_replace('images/', '', $this->getHref());

        return str_replace('../../5_', '/bundles/cegekaflandersdrive/images/', $url);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $href
     * @return $this
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Step\Paragraph $paragraphs
     * @return $this
     */
    public function setParagraph($paragraphs)
    {
        $this->paragraphs = $paragraphs;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Step\Paragraph
     */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }

}