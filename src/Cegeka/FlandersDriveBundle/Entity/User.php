<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"flandersId", "login", "referenceCompanyId", "password", "type"})
 */
class User extends EntityBase
{
    /**
     * @var Company
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $referenceCompany;

    /**
     * @var string
     * @JMS\SerializedName("refCompany")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $referenceCompanyId;

    /**
     * @var string
     * @ORM\Column(type="string", name="flanders_id")
     * @JMS\SerializedName("id")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $flandersId;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("typeUser")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $type;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("password")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("login")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $login;

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
     * @param string $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Company $referenceCompany
     * @return $this
     */
    public function setReferenceCompany($referenceCompany)
    {
        $this->referenceCompany = $referenceCompany;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Company
     */
    public function getReferenceCompany()
    {
        return $this->referenceCompany;
    }

    /**
     * @param mixed $referenceCompanyId
     * @return $this
     */
    public function setReferenceCompanyId($referenceCompanyId)
    {
        $this->referenceCompanyId = $referenceCompanyId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceCompanyId()
    {
        return $this->referenceCompanyId;
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


}