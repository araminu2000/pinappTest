<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Step\Raci;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("role")
 * @JMS\AccessorOrder("custom", custom = {"person", "role", "description", "management"})
 */
class Role extends EntityBase
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("tagPerson")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $person;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("role")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $role;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("descr")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("mngnt")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $management;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Raci", mappedBy="peopleResponsible")
     */
    protected $racisWhereResponsible;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Raci", mappedBy="peopleConsulted")
     */
    protected $racisWhereConsulted;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Raci", mappedBy="peopleInformed")
     */
    protected $racisWhereInformed;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Raci", mappedBy="peopleAccountable")
     */
    protected $racisWhereAccountable;

    public function __toString()
    {
        return "{$this->getRole()} ({$this->getPerson()})";
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
     * @param string $management
     * @return $this
     */
    public function setManagement($management)
    {
        $this->management = $management;
        return $this;
    }

    /**
     * @return string
     */
    public function getManagement()
    {
        return $this->management;
    }

    /**
     * @param string $person
     * @return $this
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @return string
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param string $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $racis
     * @return $this
     */
    public function setRacisWhereResponsible($racis)
    {
        $this->racisWhereResponsible = $racis;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRacisWhereResponsible()
    {
        return $this->racisWhereResponsible;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $racis
     * @return $this
     */
    public function setRacisWhereConsulted($racis)
    {
        $this->racisWhereConsulted = $racis;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRacisWhereConsulted()
    {
        return $this->racisWhereConsulted;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $racis
     * @return $this
     */
    public function setRacisWhereInformed($racis)
    {
        $this->racisWhereInformed = $racis;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRacisWhereInformed()
    {
        return $this->racisWhereInformed;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $racis
     * @return $this
     */
    public function setRacisWhereAccountable($racis)
    {
        $this->racisWhereAccountable = $racis;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRacisWhereAccountable()
    {
        return $this->racisWhereAccountable;
    }

} 