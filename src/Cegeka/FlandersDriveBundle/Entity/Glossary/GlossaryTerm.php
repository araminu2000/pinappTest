<?php


namespace Cegeka\FlandersDriveBundle\Entity\Glossary;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use Cegeka\FlandersDriveBundle\Entity\EntityBase;

/**
 * @ORM\Entity
 * @ORM\Table(name="glossary_term")
 * @JMS\ExclusionPolicy("all")
 */
class GlossaryTerm extends EntityBase
{
    public function __toString()
    {
        return $this->getFlandersId() . " - ({$this->getId()})";
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="flanders_id")
     * @JMS\SerializedName("id")
     * @JMS\Type(name="string")
     * @JMS\XmlAttribute
     * @JMS\Expose
     */
    protected $flandersId;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $li_safe;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62660_1;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62660_2;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62133;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_60050_482;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_60068_2_64;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_62281;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iec_61851;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso12405_1;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso12405_2;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso16750_1_2006;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_iec_pas_16898;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_6469_1_2009;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_6469_2_2009;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_dis_6469;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $iso_iec_17000;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej1797;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2380;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2464;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej1798;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2289;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2929;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $saej2344;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $un38_3;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $reg_nr_100;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ieee_1625;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ieee_1725;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ul_1642;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ul_2054;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ul_2580;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $us_dep_transp;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $nen_en_15194;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $batso_01;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $jis_c_8714;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ansi_c18_1;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ansi_c18_2;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $ineris;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $usabc_energystorageabusetest;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $usabc_freedomcar;

    /**
     * @var GlossaryStandard
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard", cascade={"persist", "remove"})
     * @JMS\SerializedName("SAND99_0497")
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $sand99_0497;

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $SAND99_0497
     * @return $this
     */
    public function setSand990497($SAND99_0497)
    {
        $this->sand99_0497 = $SAND99_0497;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSand990497()
    {
        return $this->sand99_0497;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ansi_c18_1
     * @return $this
     */
    public function setAnsiC181($ansi_c18_1)
    {
        $this->ansi_c18_1 = $ansi_c18_1;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getAnsiC181()
    {
        return $this->ansi_c18_1;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ansi_c18_2
     * @return $this
     */
    public function setAnsiC182($ansi_c18_2)
    {
        $this->ansi_c18_2 = $ansi_c18_2;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getAnsiC182()
    {
        return $this->ansi_c18_2;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $batso_01
     * @return $this
     */
    public function setBatso01($batso_01)
    {
        $this->batso_01 = $batso_01;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
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
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iec_60050_482
     * @return $this
     */
    public function setIec60050482($iec_60050_482)
    {
        $this->iec_60050_482 = $iec_60050_482;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIec60050482()
    {
        return $this->iec_60050_482;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iec_60068_2_64
     * @return $this
     */
    public function setIec60068264($iec_60068_2_64)
    {
        $this->iec_60068_2_64 = $iec_60068_2_64;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIec60068264()
    {
        return $this->iec_60068_2_64;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iec_61851
     * @return $this
     */
    public function setIec61851($iec_61851)
    {
        $this->iec_61851 = $iec_61851;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIec61851()
    {
        return $this->iec_61851;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iec_62133
     * @return $this
     */
    public function setIec62133($iec_62133)
    {
        $this->iec_62133 = $iec_62133;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIec62133()
    {
        return $this->iec_62133;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iec_62281
     * @return $this
     */
    public function setIec62281($iec_62281)
    {
        $this->iec_62281 = $iec_62281;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIec62281()
    {
        return $this->iec_62281;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iec_62660_1
     * @return $this
     */
    public function setIec626601($iec_62660_1)
    {
        $this->iec_62660_1 = $iec_62660_1;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIec626601()
    {
        return $this->iec_62660_1;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iec_62660_2
     * @return $this
     */
    public function setIec626602($iec_62660_2)
    {
        $this->iec_62660_2 = $iec_62660_2;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIec626602()
    {
        return $this->iec_62660_2;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ieee_1625
     * @return $this
     */
    public function setIeee1625($ieee_1625)
    {
        $this->ieee_1625 = $ieee_1625;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIeee1625()
    {
        return $this->ieee_1625;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ieee_1725
     * @return $this
     */
    public function setIeee1725($ieee_1725)
    {
        $this->ieee_1725 = $ieee_1725;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIeee1725()
    {
        return $this->ieee_1725;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ineris
     * @return $this
     */
    public function setIneris($ineris)
    {
        $this->ineris = $ineris;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIneris()
    {
        return $this->ineris;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso12405_1
     * @return $this
     */
    public function setIso124051($iso12405_1)
    {
        $this->iso12405_1 = $iso12405_1;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIso124051()
    {
        return $this->iso12405_1;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso12405_2
     * @return $this
     */
    public function setIso124052($iso12405_2)
    {
        $this->iso12405_2 = $iso12405_2;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIso124052()
    {
        return $this->iso12405_2;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso16750_1_2006
     * @return $this
     */
    public function setIso1675012006($iso16750_1_2006)
    {
        $this->iso16750_1_2006 = $iso16750_1_2006;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIso1675012006()
    {
        return $this->iso16750_1_2006;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso_6469_1_2009
     * @return $this
     */
    public function setIso646912009($iso_6469_1_2009)
    {
        $this->iso_6469_1_2009 = $iso_6469_1_2009;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIso646912009()
    {
        return $this->iso_6469_1_2009;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso_6469_2_2009
     * @return $this
     */
    public function setIso646922009($iso_6469_2_2009)
    {
        $this->iso_6469_2_2009 = $iso_6469_2_2009;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIso646922009()
    {
        return $this->iso_6469_2_2009;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso_dis_6469
     * @return $this
     */
    public function setIsoDis6469($iso_dis_6469)
    {
        $this->iso_dis_6469 = $iso_dis_6469;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIsoDis6469()
    {
        return $this->iso_dis_6469;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso_iec_17000
     * @return $this
     */
    public function setIsoIec17000($iso_iec_17000)
    {
        $this->iso_iec_17000 = $iso_iec_17000;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIsoIec17000()
    {
        return $this->iso_iec_17000;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $iso_iec_pas_16898
     * @return $this
     */
    public function setIsoIecPas16898($iso_iec_pas_16898)
    {
        $this->iso_iec_pas_16898 = $iso_iec_pas_16898;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getIsoIecPas16898()
    {
        return $this->iso_iec_pas_16898;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $jis_c_8714
     * @return $this
     */
    public function setJisC8714($jis_c_8714)
    {
        $this->jis_c_8714 = $jis_c_8714;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getJisC8714()
    {
        return $this->jis_c_8714;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $li_safe
     * @return $this
     */
    public function setLiSafe($li_safe)
    {
        $this->li_safe = $li_safe;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getLiSafe()
    {
        return $this->li_safe;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $nen_en_15194
     * @return $this
     */
    public function setNenEn15194($nen_en_15194)
    {
        $this->nen_en_15194 = $nen_en_15194;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getNenEn15194()
    {
        return $this->nen_en_15194;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $reg_nr_100
     * @return $this
     */
    public function setRegNr100($reg_nr_100)
    {
        $this->reg_nr_100 = $reg_nr_100;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getRegNr100()
    {
        return $this->reg_nr_100;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $saej1797
     * @return $this
     */
    public function setSaej1797($saej1797)
    {
        $this->saej1797 = $saej1797;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSaej1797()
    {
        return $this->saej1797;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $saej1798
     * @return $this
     */
    public function setSaej1798($saej1798)
    {
        $this->saej1798 = $saej1798;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSaej1798()
    {
        return $this->saej1798;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $saej2289
     * @return $this
     */
    public function setSaej2289($saej2289)
    {
        $this->saej2289 = $saej2289;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSaej2289()
    {
        return $this->saej2289;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $saej2344
     * @return $this
     */
    public function setSaej2344($saej2344)
    {
        $this->saej2344 = $saej2344;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSaej2344()
    {
        return $this->saej2344;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $saej2380
     * @return $this
     */
    public function setSaej2380($saej2380)
    {
        $this->saej2380 = $saej2380;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSaej2380()
    {
        return $this->saej2380;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $saej2464
     * @return $this
     */
    public function setSaej2464($saej2464)
    {
        $this->saej2464 = $saej2464;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSaej2464()
    {
        return $this->saej2464;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $saej2929
     * @return $this
     */
    public function setSaej2929($saej2929)
    {
        $this->saej2929 = $saej2929;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getSaej2929()
    {
        return $this->saej2929;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ul_1642
     * @return $this
     */
    public function setUl1642($ul_1642)
    {
        $this->ul_1642 = $ul_1642;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getUl1642()
    {
        return $this->ul_1642;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ul_2054
     * @return $this
     */
    public function setUl2054($ul_2054)
    {
        $this->ul_2054 = $ul_2054;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getUl2054()
    {
        return $this->ul_2054;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $ul_2580
     * @return $this
     */
    public function setUl2580($ul_2580)
    {
        $this->ul_2580 = $ul_2580;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getUl2580()
    {
        return $this->ul_2580;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $un38_3
     * @return $this
     */
    public function setUn383($un38_3)
    {
        $this->un38_3 = $un38_3;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getUn383()
    {
        return $this->un38_3;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $us_dep_transp
     * @return $this
     */
    public function setUsDepTransp($us_dep_transp)
    {
        $this->us_dep_transp = $us_dep_transp;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getUsDepTransp()
    {
        return $this->us_dep_transp;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $usabc_energystorageabusetest
     * @return $this
     */
    public function setUsabcEnergystorageabusetest($usabc_energystorageabusetest)
    {
        $this->usabc_energystorageabusetest = $usabc_energystorageabusetest;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getUsabcEnergystorageabusetest()
    {
        return $this->usabc_energystorageabusetest;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard $usabc_freedomcar
     * @return $this
     */
    public function setUsabcFreedomcar($usabc_freedomcar)
    {
        $this->usabc_freedomcar = $usabc_freedomcar;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard
     */
    public function getUsabcFreedomcar()
    {
        return $this->usabc_freedomcar;
    }


} 