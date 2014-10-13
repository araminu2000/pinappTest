<?php


namespace Cegeka\FlandersDriveBundle\Entity\Requirement;

use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="requirement_standard")
 * @JMS\ExclusionPolicy("all")
 */
class Standard extends EntityBase
{
    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * @var string
     * @ORM\Column(type="string")
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlValue(cdata=false)
     */
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement\ClauseContent", inversedBy="referencedStandards")
     * @ORM\JoinColumn(name="clause_content_id", referencedColumnName="id")
     */
    protected $clauseContent;

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
     * @param mixed $clauseContent
     * @return $this
     */
    public function setClauseContent($clauseContent)
    {
        $this->clauseContent = $clauseContent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClauseContent()
    {
        return $this->clauseContent;
    }


} 