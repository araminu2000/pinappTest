<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="note")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"referenceUserId", "date", "subject", "content"})
 */
class Note extends EntityBase
{
    public function __toString()
    {
        return $this->getSubject();
    }

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @Assert\NotNull
     */
    protected $referenceUser;

    /**
     * @var string
     * @ORM\Column(type="string", name="type")
     * @JMS\SerializedName("ref")
     * @JMS\Type("string")
     * @JMS\XmlAttribute()
     * @JMS\Expose
     */
    protected $type;

    /**
     * @var Step
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step")
     */
    protected $step;

    /**
     * @var Flow
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Flow")
     */
    protected $flow;

    /**
     * @var string
     * @JMS\SerializedName("refUser")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $referenceUserId;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @JMS\SerializedName("noteDate")
     * @JMS\Type("DateTime<'d/m/Y'>")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="datetime", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $date;

    /**
     * @var string
     * @JMS\SerializedName("noteSubject")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    protected $subject;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @JMS\SerializedName("noteContent")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $content;

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserialize()
    {
        $this->referenceUser = new User();
        $this->referenceUser->setFlandersId($this->referenceUserId);
        $this->getDate()->setTime(0, 0, 0);
    }

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
     * @param \Application\Sonata\UserBundle\Entity\User $referenceUser
     * @return $this
     */
    public function setReferenceUser($referenceUser)
    {
        $this->referenceUser = $referenceUser;
        return $this;
    }

    /**
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getReferenceUser()
    {
        return $this->referenceUser;
    }

    /**
     * @param string $referenceUserId
     * @return $this
     */
    public function setReferenceUserId($referenceUserId)
    {
        $this->referenceUserId = $referenceUserId;
        $this->ensureSyncToInternalStructure($referenceUserId);
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceUserId()
    {
        return $this->referenceUserId;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    protected function ensureSyncToInternalStructure($referenceUserId)
    {
        if (null === $this->referenceUser) {
            $this->referenceUser = new User();
        }

        $this->referenceUser->setFlandersId($referenceUserId);
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

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Flow $flow
     * @return $this
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Flow
     */
    public function getFlow()
    {
        return $this->flow;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Step $step
     * @return $this
     */
    public function setStep($step)
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Step
     */
    public function getStep()
    {
        return $this->step;
    }


} 