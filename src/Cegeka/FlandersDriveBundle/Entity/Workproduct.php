<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="work_product")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"tag", "name", "description"})
 */
class Workproduct extends EntityBase
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("tagWP")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $tag;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("nameWP")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @JMS\SerializedName("descriptionWP")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $description;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="workProducts")
     */
    protected $workproductParagraphs;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph", mappedBy="inputs")
     */
    protected $inputParagraphs;

    public function __toString()
    {
        return "{$this->getName()} - {$this->getTag()}";
    }

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
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param ArrayCollection $workproductParagraphs
     * @return $this
     */
    public function setWorkproductParagraphs($workproductParagraphs)
    {
        $this->workproductParagraphs = $workproductParagraphs;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getWorkproductParagraphs()
    {
        return $this->workproductParagraphs;
    }

    /**
     * @param ArrayCollection $inputParagraphs
     * @return $this
     */
    public function setInputParagraphs($inputParagraphs)
    {
        $this->inputParagraphs = $inputParagraphs;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getInputParagraphs()
    {
        return $this->inputParagraphs;
    }

} 