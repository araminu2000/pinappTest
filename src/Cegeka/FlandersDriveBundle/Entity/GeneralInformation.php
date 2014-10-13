<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\GeneralInformation\Scope;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="general_information")
 */
class GeneralInformation extends EntityBase
{
    public function __construct()
    {
        $this->scopes = new ArrayCollection();
        $this->normes = new ArrayCollection();
        $this->generalRequirements = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="flanders_id")
     * @JMS\SerializedName("stdId")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $flandersId;

    /**
     * @var
     * @ORM\Column(type="text")
     * @JMS\SerializedName("title")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $title;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="general_information_scopes")
     * @JMS\SerializedName("scope")
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Cegeka\FlandersDriveBundle\Entity\GeneralInformation\XML\Scope>")
     * @JMS\XmlList(entry = "stdScope")
     */
    protected $scopes;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="general_information_normes")
     * @JMS\SerializedName("normRef")
     * @JMS\Expose
     * @JMS\Type(name="ArrayCollection<Cegeka\FlandersDriveBundle\Entity\GeneralInformation\XML\Norm>")
     * @JMS\XmlList(entry = "refNormRef")
     */
    protected $normes;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="general_information_general_requirements")
     * @JMS\SerializedName("generalReq")
     * @JMS\Expose
     * @JMS\Type(name="ArrayCollection<Cegeka\FlandersDriveBundle\Entity\GeneralInformation\XML\GeneralRequirement>")
     * @JMS\XmlList(entry = "refGenReq")
     */
    protected $generalRequirements;

    /**
     * @param string $flandersId
     * @return $this
     */
    public function setFlandersId($flandersId)
    {
        $this->flandersId = $flandersId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlandersId()
    {
        return $this->flandersId;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $generalRequirements
     * @return $this
     */
    public function setGeneralRequirements($generalRequirements)
    {
        $this->generalRequirements = $generalRequirements;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGeneralRequirements()
    {
        return $this->generalRequirements;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $normes
     * @return $this
     */
    public function setNormes($normes)
    {
        $this->normes = $normes;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getNormes()
    {
        return $this->normes;
    }

    /**
     * @param mixed $scopes
     * @return $this
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }


} 