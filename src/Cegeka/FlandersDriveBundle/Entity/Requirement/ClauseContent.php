<?php


namespace Cegeka\FlandersDriveBundle\Entity\Requirement;

use Cegeka\FlandersDriveBundle\Entity\Collection\Requirement\LinkFlowCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Requirement\StandardCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use Cegeka\FlandersDriveBundle\Entity\EntityBase;

/**
 * @ORM\Entity
 * @ORM\Table(name="requirement_clause_content")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"referencedOtherRequirements", "textClause", "referencedStandards", "linkFlowSteps"})
 */
class ClauseContent extends EntityBase
{
    public function __toString()
    {
        return (string) $this->getId();
    }

    public function __construct()
    {
        $this->referencedStandards = new ArrayCollection();
        $this->referencedOtherRequirements = new ArrayCollection();
        $this->linkFlowSteps = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement", inversedBy="clauseContent")
     */
    protected $requirement;

    /**
     * @var OtherCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement\Other", mappedBy="clauseContent", cascade={"remove", "persist"})
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Requirement\OtherCollection")
     * @JMS\XmlList(inline = true, entry = "refOtherReq")
     * @JMS\Expose
     */
    protected $referencedOtherRequirements;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement\LinkFlow", mappedBy="clauseContent", cascade={"remove", "persist"})
     * @JMS\Type("ArrayCollection<Cegeka\FlandersDriveBundle\Entity\Requirement\LinkFlow>")
     * @JMS\XmlList(inline = true, entry = "link_flow_step_clause")
     * @JMS\Expose
     */
    protected $linkFlowSteps;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement\Standard", mappedBy="clauseContent", cascade={"remove", "persist"})
     * @JMS\Type("ArrayCollection<Cegeka\FlandersDriveBundle\Entity\Requirement\Standard>")
     * @JMS\XmlList(inline = true, entry = "refToStandard")
     * @JMS\Expose
     */
    protected $referencedStandards;

    /**
     * @param ArrayCollection $linkFlowSteps
     * @return $this
     */
    public function setLinkFlowSteps($linkFlowSteps)
    {
        $this->linkFlowSteps = $linkFlowSteps;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getLinkFlowSteps()
    {
        return $this->linkFlowSteps;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Requirement\OtherCollection $referencedOtherRequirements
     * @return $this
     */
    public function setReferencedOtherRequirements($referencedOtherRequirements)
    {
        $this->referencedOtherRequirements = $referencedOtherRequirements;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Requirement\OtherCollection
     */
    public function getReferencedOtherRequirements()
    {
        return $this->referencedOtherRequirements;
    }

    /**
     * @param ArrayCollection $referencedStandards
     * @return $this
     */
    public function setReferencedStandards($referencedStandards)
    {
        $this->referencedStandards = $referencedStandards;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getReferencedStandards()
    {
        return $this->referencedStandards;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Requirement\TextClause $textClause
     * @return $this
     */
    public function setTextClause($textClause)
    {
        $this->textClause = $textClause;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Requirement\TextClause
     */
    public function getTextClause()
    {
        return $this->textClause;
    }

    /**
     * @param mixed $requirement
     * @return $this
     */
    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequirement()
    {
        return $this->requirement;
    }


} 