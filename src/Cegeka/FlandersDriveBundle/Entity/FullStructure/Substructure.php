<?php


namespace Cegeka\FlandersDriveBundle\Entity\FullStructure;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table("structure_full_substructure")
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("sub")
 * @JMS\AccessorOrder("custom", custom = {"type", "value"})
 */
class Substructure extends EntityBase
{
    public function __toString() {
        return "{$this->getValue()}";
    }

    /**
     * @var Group
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\FullStructure\Group", inversedBy="substructures")
     */
    protected $group;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Expose
     * @JMS\Type("string")
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $value;

    /**
     * @var string
     * @ORM\Column(type="string", name="type", nullable=true)
     * @JMS\SerializedName("type")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $type;

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\FullStructure\Group $group
     * @return $this
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\FullStructure\Group
     */
    public function getGroup()
    {
        return $this->group;
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


} 