<?php


namespace Cegeka\FlandersDriveBundle\Entity\Requirement;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use Cegeka\FlandersDriveBundle\Entity\EntityBase;

/**
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"tag", "part", "clauseNumber", "chapterNumber"})
 */
class Simple extends EntityBase
{
    public function __toString()
    {
        return "{$this->getTag()} - {$this->getChapterNumber()} - {$this->getClauseNumber()} - {$this->getPart()}";
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


} 