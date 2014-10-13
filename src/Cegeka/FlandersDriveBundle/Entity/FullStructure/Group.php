<?php


namespace Cegeka\FlandersDriveBundle\Entity\FullStructure;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Cegeka\FlandersDriveBundle\Entity\FullStructure;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="structure_full_group")
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("group")
 */
class Group extends EntityBase
{
    public function __toString()
    {
        return "{$this->getName()} ({$this->getId()})";
    }

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\FullStructure\Substructure", mappedBy="group", cascade={"persist", "remove"})
     * @JMS\Type("ArrayCollection<Cegeka\FlandersDriveBundle\Entity\FullStructure\Substructure>")
     * @JMS\XmlList(inline = true, entry = "sub")
     * @JMS\Expose
     */
    protected $substructures;

    /**
     * @var string
     * @ORM\Column(type="string", name="name", nullable=true)
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\XmlAttribute
     * @JMS\Expose
     */
    protected $name;

    /**
     * @var FullStructure
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\FullStructure", inversedBy="groups")
     */
    protected $structure;

    /**
     * @param mixed $substructures
     * @return $this
     */
    public function setSubstructures($substructures)
    {
        $this->substructures = $substructures;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubstructures()
    {
        return $this->substructures;
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
     * @param \Cegeka\FlandersDriveBundle\Entity\FullStructure $structure
     * @return $this
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\FullStructure
     */
    public function getStructure()
    {
        return $this->structure;
    }


} 