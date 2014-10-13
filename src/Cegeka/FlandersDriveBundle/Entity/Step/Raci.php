<?php


namespace Cegeka\FlandersDriveBundle\Entity\Step;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="raci")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"peopleResponsibleXML", "peopleConsultedXML", "peopleInformedXML", "peopleAccountableXML"})
 * @JMS\XmlRoot("raci")
 */
class Raci extends EntityBase
{
    public function __toString()
    {
        return 'Raci for '. $this->paragraph;
    }

    /**
     * @var Paragraph
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Paragraph")
     */
    protected $paragraph;

    /**
     * @var array $peopleResponsible
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "responsible")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $peopleResponsibleXML;

    /**
     * @var ArrayCollection $peopleResponsible
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Role", inversedBy="responsibleRacis")
     * @ORM\JoinTable(name="racis_people_responsible")
     **/
    protected $peopleResponsible;

    /**
     * @var array $peopleConsulted
     * @JMS\SerializedName("consulted")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "consulted")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $peopleConsultedXML;

    /**
     * @var ArrayCollection $peopleConsulted
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Role", inversedBy="racisWhereConsulted")
     * @ORM\JoinTable(name="racis_people_consulted")
     **/
    protected $peopleConsulted;

    /**
     * @var array $peopleInformed
     * @JMS\SerializedName("informed")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "informed")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $peopleInformedXML;


    /**
     * @var ArrayCollection $peopleInformed
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Role", inversedBy="racisWhereInformed")
     * @ORM\JoinTable(name="racis_people_informed")
     **/
    protected $peopleInformed;

    /**
     * @var array $peopleAccountable
     * @JMS\SerializedName("accountable")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "accountable")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $peopleAccountableXML;

    /**
     * @var ArrayCollection $peopleAccountable
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Role", inversedBy="racisWhereAccountable")
     * @ORM\JoinTable(name="racis_people_accountable")
     **/
    protected $peopleAccountable;


    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Step\Paragraph $paragraph
     * @return $this
     */
    public function setParagraph($paragraph)
    {
        $this->paragraph = $paragraph;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Step\Paragraph
     */
    public function getParagraph()
    {
        return $this->paragraph;
    }

    /**
     * @return array
     */
    public function getPeopleResponsibleXML()
    {
        return $this->peopleResponsibleXML;
    }

    /**
     * @param array $peopleResponsible
     * @return $this
     */
    public function setPeopleResponsibleXML($peopleResponsible)
    {
        $this->peopleResponsibleXML = $peopleResponsible;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPeopleResponsible()
    {
        return $this->peopleResponsible;
    }

    /**
     * @param ArrayCollection $peopleResponsible
     * @return $this
     */
    public function setPeopleResponsible($peopleResponsible)
    {
        $this->peopleResponsible = $peopleResponsible;
        return $this;
    }

    /**
     * @return array
     */
    public function getPeopleConsultedXML()
    {
        return $this->peopleConsultedXML;
    }

    /**
     * @param array $peopleConsulted
     * @return $this
     */
    public function setPeopleConsultedXML($peopleConsulted)
    {
        $this->peopleConsultedXML = $peopleConsulted;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPeopleConsulted()
    {
        return $this->peopleConsulted;
    }

    /**
     * @param ArrayCollection $peopleConsulted
     * @return $this
     */
    public function setPeopleConsulted($peopleConsulted)
    {
        $this->peopleConsulted = $peopleConsulted;
        return $this;
    }

    /**
     * @return array
     */
    public function getPeopleInformedXML()
    {
        return $this->peopleInformedXML;
    }

    /**
     * @param array $peopleInformed
     * @return $this
     */
    public function setPeopleInformedXML($peopleInformed)
    {
        $this->peopleInformedXML = $peopleInformed;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPeopleInformed()
    {
        return $this->peopleInformed;
    }

    /**
     * @param ArrayCollection $peopleInformed
     * @return $this
     */
    public function setPeopleInformed($peopleInformed)
    {
        $this->peopleInformed = $peopleInformed;
        return $this;
    }

    /**
     * @return array
     */
    public function getPeopleAccountableXML()
    {
        return $this->peopleAccountableXML;
    }

    /**
     * @param array $peopleAccountable
     * @return $this
     */
    public function setPeopleAccountableXML($peopleAccountable)
    {
        $this->peopleAccountableXML = $peopleAccountable;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPeopleAccountable()
    {
        return $this->peopleAccountable;
    }

    /**
     * @param ArrayCollection $peopleAccountable
     * @return $this
     */
    public function setPeopleAccountable($peopleAccountable)
    {
        $this->peopleAccountable = $peopleAccountable;
        return $this;
    }

}