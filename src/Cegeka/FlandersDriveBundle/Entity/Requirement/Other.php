<?php


namespace Cegeka\FlandersDriveBundle\Entity\Requirement;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use Cegeka\FlandersDriveBundle\Entity\EntityBase;

/**
 * @ORM\Entity
 * @ORM\Table(name="requirement_other")
 * @JMS\ExclusionPolicy("all")
 */
class Other extends EntityBase
{
    public function __toString()
    {
        return $this->getTag();
    }

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\SerializedName("refOtherReq_tag")
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
     * @JMS\SerializedName("refOtherReq_part")
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
     * @JMS\SerializedName("refOtherReq_chNo")
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
     * @JMS\SerializedName("refOtherReq_clNo")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $clauseNumber;

    /**
     * @var ClauseContent
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement\ClauseContent", inversedBy="referencedOtherRequirements")
     */
    protected $clauseContent;

    /**
     * @param string $chapterNumber
     * @return $this
     */
    public function setChapterNumber($chapterNumber)
    {
        $this->chapterNumber = $chapterNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getChapterNumber()
    {
        return $this->chapterNumber;
    }

    /**
     * @param string $clauseNumber
     * @return $this
     */
    public function setClauseNumber($clauseNumber)
    {
        $this->clauseNumber = $clauseNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getClauseNumber()
    {
        return $this->clauseNumber;
    }

    /**
     * @param string $part
     * @return $this
     */
    public function setPart($part)
    {
        $this->part = $part;
        return $this;
    }

    /**
     * @return string
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Requirement\ClauseContent $clauseContent
     * @return $this
     */
    public function setClauseContent($clauseContent)
    {
        $this->clauseContent = $clauseContent;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Requirement\ClauseContent
     */
    public function getClauseContent()
    {
        return $this->clauseContent;
    }


} 