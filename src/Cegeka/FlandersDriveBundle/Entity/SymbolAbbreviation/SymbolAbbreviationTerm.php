<?php


namespace Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use Cegeka\FlandersDriveBundle\Entity\EntityBase;

/**
 * @ORM\Entity
 * @ORM\Table(name="symbol_abbreviation_term")
 * @JMS\ExclusionPolicy("all")
 */
class SymbolAbbreviationTerm extends EntityBase
{
    public function __toString() {
        return $this->getFlandersId() . " - ({$this->getId()})";
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="flanders_id", nullable=true)
     * @JMS\SerializedName("id")
     * @JMS\Type(name="string")
     * @JMS\XmlAttribute
     * @JMS\Expose
     */
    protected $flandersId;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $li_safe;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62660_1;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62660_2;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62133;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_60050_482;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_60068_2_64;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62281;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_61851;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso12405_1;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso12405_2;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso16750_1_2006;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_iec_pas_16898;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_6469_1_2009;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_6469_2_2009;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_dis_6469;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_iec_17000;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej1797;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2380;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2464;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej1798;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2289;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2929;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2344;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $un38_3;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $reg_nr_100;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ieee_1625;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ieee_1725;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ul_1642;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ul_2054;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ul_2580;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $us_dep_transp;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $nen_en_15194;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $batso_01;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $jis_c_8714;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ansi_c18_1;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ansi_c18_2;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ineris;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $usabc_energystorageabusetest;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $usabc_freedomcar;

    /**
     * @var SymbolAbbreviationStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard", cascade={"persist", "remove"})
     * @JMS\SerializedName("SAND99_0497")
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $sand99_0497;

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $SAND99_0497
     * @return $this
     */
    public function setSand990497($SAND99_0497)
    {
        $this->sand99_0497 = $SAND99_0497;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSand990497()
    {
        return $this->sand99_0497;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ansi_c18_1
     * @return $this
     */
    public function setAnsiC181($ansi_c18_1)
    {
        $this->ansi_c18_1 = $ansi_c18_1;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getAnsiC181()
    {
        return $this->ansi_c18_1;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ansi_c18_2
     * @return $this
     */
    public function setAnsiC182($ansi_c18_2)
    {
        $this->ansi_c18_2 = $ansi_c18_2;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getAnsiC182()
    {
        return $this->ansi_c18_2;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $batso_01
     * @return $this
     */
    public function setBatso01($batso_01)
    {
        $this->batso_01 = $batso_01;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getBatso01()
    {
        return $this->batso_01;
    }

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
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iec_60050_482
     * @return $this
     */
    public function setIec60050482($iec_60050_482)
    {
        $this->iec_60050_482 = $iec_60050_482;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIec60050482()
    {
        return $this->iec_60050_482;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iec_60068_2_64
     * @return $this
     */
    public function setIec60068264($iec_60068_2_64)
    {
        $this->iec_60068_2_64 = $iec_60068_2_64;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIec60068264()
    {
        return $this->iec_60068_2_64;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iec_61851
     * @return $this
     */
    public function setIec61851($iec_61851)
    {
        $this->iec_61851 = $iec_61851;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIec61851()
    {
        return $this->iec_61851;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iec_62133
     * @return $this
     */
    public function setIec62133($iec_62133)
    {
        $this->iec_62133 = $iec_62133;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIec62133()
    {
        return $this->iec_62133;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iec_62281
     * @return $this
     */
    public function setIec62281($iec_62281)
    {
        $this->iec_62281 = $iec_62281;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIec62281()
    {
        return $this->iec_62281;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iec_62660_1
     * @return $this
     */
    public function setIec626601($iec_62660_1)
    {
        $this->iec_62660_1 = $iec_62660_1;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIec626601()
    {
        return $this->iec_62660_1;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iec_62660_2
     * @return $this
     */
    public function setIec626602($iec_62660_2)
    {
        $this->iec_62660_2 = $iec_62660_2;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIec626602()
    {
        return $this->iec_62660_2;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ieee_1625
     * @return $this
     */
    public function setIeee1625($ieee_1625)
    {
        $this->ieee_1625 = $ieee_1625;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIeee1625()
    {
        return $this->ieee_1625;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ieee_1725
     * @return $this
     */
    public function setIeee1725($ieee_1725)
    {
        $this->ieee_1725 = $ieee_1725;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIeee1725()
    {
        return $this->ieee_1725;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ineris
     * @return $this
     */
    public function setIneris($ineris)
    {
        $this->ineris = $ineris;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIneris()
    {
        return $this->ineris;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso12405_1
     * @return $this
     */
    public function setIso124051($iso12405_1)
    {
        $this->iso12405_1 = $iso12405_1;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIso124051()
    {
        return $this->iso12405_1;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso12405_2
     * @return $this
     */
    public function setIso124052($iso12405_2)
    {
        $this->iso12405_2 = $iso12405_2;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIso124052()
    {
        return $this->iso12405_2;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso16750_1_2006
     * @return $this
     */
    public function setIso1675012006($iso16750_1_2006)
    {
        $this->iso16750_1_2006 = $iso16750_1_2006;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIso1675012006()
    {
        return $this->iso16750_1_2006;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso_6469_1_2009
     * @return $this
     */
    public function setIso646912009($iso_6469_1_2009)
    {
        $this->iso_6469_1_2009 = $iso_6469_1_2009;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIso646912009()
    {
        return $this->iso_6469_1_2009;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso_6469_2_2009
     * @return $this
     */
    public function setIso646922009($iso_6469_2_2009)
    {
        $this->iso_6469_2_2009 = $iso_6469_2_2009;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIso646922009()
    {
        return $this->iso_6469_2_2009;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso_dis_6469
     * @return $this
     */
    public function setIsoDis6469($iso_dis_6469)
    {
        $this->iso_dis_6469 = $iso_dis_6469;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIsoDis6469()
    {
        return $this->iso_dis_6469;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso_iec_17000
     * @return $this
     */
    public function setIsoIec17000($iso_iec_17000)
    {
        $this->iso_iec_17000 = $iso_iec_17000;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIsoIec17000()
    {
        return $this->iso_iec_17000;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $iso_iec_pas_16898
     * @return $this
     */
    public function setIsoIecPas16898($iso_iec_pas_16898)
    {
        $this->iso_iec_pas_16898 = $iso_iec_pas_16898;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getIsoIecPas16898()
    {
        return $this->iso_iec_pas_16898;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $jis_c_8714
     * @return $this
     */
    public function setJisC8714($jis_c_8714)
    {
        $this->jis_c_8714 = $jis_c_8714;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getJisC8714()
    {
        return $this->jis_c_8714;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $li_safe
     * @return $this
     */
    public function setLiSafe($li_safe)
    {
        $this->li_safe = $li_safe;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getLiSafe()
    {
        return $this->li_safe;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $nen_en_15194
     * @return $this
     */
    public function setNenEn15194($nen_en_15194)
    {
        $this->nen_en_15194 = $nen_en_15194;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getNenEn15194()
    {
        return $this->nen_en_15194;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $reg_nr_100
     * @return $this
     */
    public function setRegNr100($reg_nr_100)
    {
        $this->reg_nr_100 = $reg_nr_100;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getRegNr100()
    {
        return $this->reg_nr_100;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $saej1797
     * @return $this
     */
    public function setSaej1797($saej1797)
    {
        $this->saej1797 = $saej1797;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSaej1797()
    {
        return $this->saej1797;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $saej1798
     * @return $this
     */
    public function setSaej1798($saej1798)
    {
        $this->saej1798 = $saej1798;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSaej1798()
    {
        return $this->saej1798;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $saej2289
     * @return $this
     */
    public function setSaej2289($saej2289)
    {
        $this->saej2289 = $saej2289;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSaej2289()
    {
        return $this->saej2289;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $saej2344
     * @return $this
     */
    public function setSaej2344($saej2344)
    {
        $this->saej2344 = $saej2344;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSaej2344()
    {
        return $this->saej2344;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $saej2380
     * @return $this
     */
    public function setSaej2380($saej2380)
    {
        $this->saej2380 = $saej2380;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSaej2380()
    {
        return $this->saej2380;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $saej2464
     * @return $this
     */
    public function setSaej2464($saej2464)
    {
        $this->saej2464 = $saej2464;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSaej2464()
    {
        return $this->saej2464;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $saej2929
     * @return $this
     */
    public function setSaej2929($saej2929)
    {
        $this->saej2929 = $saej2929;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getSaej2929()
    {
        return $this->saej2929;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ul_1642
     * @return $this
     */
    public function setUl1642($ul_1642)
    {
        $this->ul_1642 = $ul_1642;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getUl1642()
    {
        return $this->ul_1642;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ul_2054
     * @return $this
     */
    public function setUl2054($ul_2054)
    {
        $this->ul_2054 = $ul_2054;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getUl2054()
    {
        return $this->ul_2054;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $ul_2580
     * @return $this
     */
    public function setUl2580($ul_2580)
    {
        $this->ul_2580 = $ul_2580;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getUl2580()
    {
        return $this->ul_2580;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $un38_3
     * @return $this
     */
    public function setUn383($un38_3)
    {
        $this->un38_3 = $un38_3;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getUn383()
    {
        return $this->un38_3;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $us_dep_transp
     * @return $this
     */
    public function setUsDepTransp($us_dep_transp)
    {
        $this->us_dep_transp = $us_dep_transp;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getUsDepTransp()
    {
        return $this->us_dep_transp;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $usabc_energystorageabusetest
     * @return $this
     */
    public function setUsabcEnergystorageabusetest($usabc_energystorageabusetest)
    {
        $this->usabc_energystorageabusetest = $usabc_energystorageabusetest;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getUsabcEnergystorageabusetest()
    {
        return $this->usabc_energystorageabusetest;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard $usabc_freedomcar
     * @return $this
     */
    public function setUsabcFreedomcar($usabc_freedomcar)
    {
        $this->usabc_freedomcar = $usabc_freedomcar;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard
     */
    public function getUsabcFreedomcar()
    {
        return $this->usabc_freedomcar;
    }


} 