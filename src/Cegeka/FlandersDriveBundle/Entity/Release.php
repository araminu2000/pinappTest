<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="`release`")
 * @JMS\ExclusionPolicy("all")
 * @JMS\XmlRoot("release")
 */
class Release extends EntityBase
{
    public function __toString() {
        return "{$this->getVersion()}";
    }

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserialize()
    {
        $this->getDate()->setTime(0, 0, 0);
    }

    /**
     * @var string
     * @ORM\Column(type="string", name="version")
     * @JMS\SerializedName("version")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     */
    protected $version;

    /**
     * @var string
     * @ORM\Column(type="text", name="content")
     * @JMS\SerializedName("content")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=true)
     * @JMS\Expose
     * @Assert\NotNull
     */
    protected $content;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="date")
     * @JMS\SerializedName("date")
     * @JMS\Type("DateTime<'d/m/Y'>")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     */
    protected $date;

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        $this->date->setTime(0, 0, 0);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }


} 