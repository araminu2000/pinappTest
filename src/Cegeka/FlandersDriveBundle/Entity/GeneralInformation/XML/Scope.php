<?php


namespace Cegeka\FlandersDriveBundle\Entity\GeneralInformation\XML;


use Cegeka\FlandersDriveBundle\Entity\Requirement\Simple;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

class Scope extends Simple
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("refToScope_tag")
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
     * @JMS\SerializedName("refToScope_part")
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
     * @JMS\SerializedName("refToScope_chNo")
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
     * @JMS\SerializedName("refToScope_clNo")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $clauseNumber;
} 