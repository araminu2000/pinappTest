<?php


namespace Cegeka\FlandersDriveBundle\Entity\Requirement;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="requirement_link_flow")
 * @JMS\ExclusionPolicy("all")
 */
class LinkFlow extends EntityBase
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlValue(cdata=false)
     * @JMS\XmlAttribute
     * @JMS\SerializedName("flow_step_href")
     */
    protected $href;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlValue(cdata=false)
     */
    protected $value;

    /**
     * @var ClauseContent
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement\ClauseContent", inversedBy="linkFlowSteps")
     */
    protected $clauseContent;

    public function __toString()
    {
        return "{$this->getValue()} - {$this->getHref()}";
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $href
     * @return $this
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
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