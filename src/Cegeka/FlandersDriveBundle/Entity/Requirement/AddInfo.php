<?php


namespace Cegeka\FlandersDriveBundle\Entity\Requirement;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="requirement_add_info_step")
 * @JMS\ExclusionPolicy("all")
 */
class AddInfo extends EntityBase
{
    public function __toString()
    {
        return "{$this->getValue()} - {$this->getHref()}";
    }

    /**
     * @var string
     * @ORM\Column(type="string")
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
     * @var Requirement
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement", inversedBy="addInfo")
     */
    protected $requirement;

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
     * @param \Cegeka\FlandersDriveBundle\Entity\Requirement $requirement
     * @return $this
     */
    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Requirement
     */
    public function getRequirement()
    {
        return $this->requirement;
    }


} 