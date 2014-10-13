<?php


namespace Cegeka\FlandersDriveBundle\Entity\GeneralInformation\XML;


use Cegeka\FlandersDriveBundle\Entity\Requirement\Simple;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

class Norm extends Simple
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("refToNormRef_tag")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $tag;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("refToNormRef_part")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $part;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("refToNormRef_chNo")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $chapterNumber;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("refToNormRef_clNo")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $clauseNumber;
} 