<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="company")
 * @JMS\AccessorOrder("custom", custom = {"flandersId", "name"})
 * @JMS\XmlRoot("company")
 * @JMS\ExclusionPolicy("all")
 */
class Company extends EntityBase
{
    public function __toString() {
        return "{$this->getName()} - {$this->getFlandersId()} ({$this->getId()})";
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="flanders_id", unique=true)
     * @JMS\SerializedName("idCompany")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $flandersId;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @JMS\SerializedName("nameCompany")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step", mappedBy="processOwner", cascade={"remove", "persist"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Step")
     */
    protected $steps;

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this->name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $referenceId
     * @return $this
     */
    public function setFlandersId($referenceId)
    {
        $this->flandersId = $referenceId;
        return $this->flandersId;
    }

    /**
     * @return string
     */
    public function getFlandersId()
    {
        return $this->flandersId;
    }
}