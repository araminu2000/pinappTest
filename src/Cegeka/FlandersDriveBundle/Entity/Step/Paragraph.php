<?php


namespace Cegeka\FlandersDriveBundle\Entity\Step;

use Cegeka\FlandersDriveBundle\Entity\Collection\Step\RequirementCollection;
use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType;
use Cegeka\FlandersDriveBundle\Entity\Scaling\Activity;
use Cegeka\FlandersDriveBundle\Entity\Step;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="paragraph")
 * @JMS\ExclusionPolicy("all")
 * @JMS\AccessorOrder("custom", custom = {"productType", "activity", "materialsXML", "recommendationsXML", "componentsXML", "inputsXML", "requirementsXML", "linkFlowSteps", "raci", "htmlText", "workProductsXML", "testLabsXML", "images"})
 * @JMS\XmlRoot("paragraph")
 */
class Paragraph extends EntityBase
{
    /**
     * @var Step
     * @ORM\ManyToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step", inversedBy="description"), cascade={"persist"})
     * @ORM\JoinColumn(name="step_id", referencedColumnName="id")
     */
    protected $step;

    /**
     * @var ProductType
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType", cascade={"persist"})
     * @ORM\JoinColumn(name="product_type_id", referencedColumnName="id")
     * @JMS\SerializedName("prodType")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType")
     */
    protected $productType;

    /**
     * @var Activity
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Scaling\Activity", cascade={"persist"})
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id")
     * @JMS\SerializedName("act")
     * @JMS\Expose
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Scaling\Activity")
     */
    protected $activity;

    /**
     * @var array $materials
     * @JMS\SerializedName("materials")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "materials")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $materialsXML;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Material", inversedBy="paragraphs", cascade={"persist"})
     * @ORM\JoinTable(name="paragraphs_materials")
     **/
    protected $materials;

    /**
     * @var array $recommendationsXML
     * @JMS\SerializedName("recommendations")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "recoms")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $recommendationsXML;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Recommendation", inversedBy="paragraphs", cascade={"persist"})
     * @ORM\JoinTable(name="paragraphs_recommendations")
     **/
    protected $recommendations;

    /**
     * @var array $components
     * @JMS\SerializedName("components")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "components")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $componentsXML;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Component", inversedBy="paragraphs", cascade={"persist"})
     * @ORM\JoinTable(name="paragraphs_components")
     **/
    protected $components;

    /**
     * @var array $inputs
     * @JMS\SerializedName("inputs")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "inputs")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $inputsXML;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Workproduct", inversedBy="inputParagraphs")
     * @ORM\JoinTable(name="paragraphs_inputs")
     **/
    protected $inputs;

    /**
     * @var RequirementCollection
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Collection\Step\RequirementCollection")
     * @JMS\XmlList(inline = true, entry = "reqs")
     * @JMS\SerializedName("reqs")
     * @JMS\Expose
     */
    protected $requirementsXML;

    /**
     * @var ArrayCollection $requirements
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Requirement", inversedBy="paragraphs")
     * @ORM\JoinTable(name="paragraphs_requirements")
     **/
    protected $requirements;

    /**
     * @var ArrayCollection $linkFlowSteps
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\LinkFlow", cascade={"persist"}, inversedBy="paragraphs")
     * @ORM\JoinTable(name="paragraphs_step_link_flows")
     * @JMS\Type("ArrayCollection<Cegeka\FlandersDriveBundle\Entity\Step\LinkFlow>")
     * @JMS\XmlList(inline = true, entry = "link_flow_step_paragraph")
     * @JMS\Exposeø
     **/
    protected $linkFlowSteps;

    /**
     * @var Raci
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Raci", mappedBy="paragraph", cascade={"persist", "remove"})
     * @JMS\SerializedName("raci")
     * @JMS\Type(name="Cegeka\FlandersDriveBundle\Entity\Step\Raci")
     * @JMS\XmlElement(cdata=false)
     * @JMS\Expose
     */
    // ToDo Show element if no values in element
    protected $raci;

    /**
     * @var string
     * @ORM\Column(type="text", name="html_text", nullable=true)
     * @JMS\SerializedName("htmltext")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=true)
     * @JMS\Expose
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $htmlText;

    /**
     * @var array $workProductsXML
     * @JMS\SerializedName("workproducts")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "workproducts")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $workProductsXML;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Workproduct", inversedBy="workproductParagraphs")
     * @ORM\JoinTable(name="paragraphs_workproducts")
     **/
    protected $workProducts;

    /**
     * @var array $testLabsXML
     * @JMS\SerializedName("testLabs")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline = true, entry = "testLabs")
     * @JMS\Expose
     * @JMS\Type("array<string>")
     */
    protected $testLabsXML;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Testlab", inversedBy="paragraphs")
     * @ORM\JoinTable(name="paragraphs_testlabs")
     **/
    protected $testLabs;

    /**
     * @var ArrayCollection $images
     * @ORM\ManyToMany(targetEntity="Cegeka\FlandersDriveBundle\Entity\Step\Image", inversedBy="paragraphs")
     * @ORM\JoinTable(name="paragraphs_images")
     * @JMS\Type("ArrayCollection<Cegeka\FlandersDriveBundle\Entity\Step\Image>")
     * @JMS\XmlList(inline = true, entry = "img")
     * @JMS\Exposeø
     **/
    protected $images;

    public function __construct()
    {
        $this->linkFlowSteps = new ArrayCollection();
    }

    public function __toString()
    {
        return "{$this->getStep()} - {$this->getProductType()} - {$this->getActivity()} - ({$this->getId()})";
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\ProductType $productType
     * @return $this
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Scaling\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Scaling\Activity $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return array
     */
    public function getMaterialsXML()
    {
        return $this->materialsXML;
    }

    /**
     * @param array $materials
     * @return $this
     */
    public function setMaterialsXML($materials)
    {
        $this->materialsXML = $materials;
        return $this;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $materials
     * @return $this
     */
    public function setMaterials($materials)
    {
        $this->materials = $materials;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getMaterials()
    {
        return $this->materials;
    }

    /**
     * @return array
     */
    public function getRecommendationsXML()
    {
        return $this->recommendationsXML;
    }

    /**
     * @param array $recommendationsXML
     * @return $this
     */
    public function setRecommendationsXML($recommendationsXML)
    {
        $this->recommendationsXML = $recommendationsXML;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }

    /**
     * @param ArrayCollection $recommendations
     * @return $this
     */
    public function setRecommendations($recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }

    /**
     * @return array
     */
    public function getComponentsXML()
    {
        return $this->componentsXML;
    }

    /**
     * @param array $components
     * @return $this
     */
    public function setComponentsXML($components)
    {
        $this->componentsXML = $components;
        return $this;
    }

    /**
     * @param ArrayCollection $components
     * @return $this
     */
    public function setComponents($components)
    {
        $this->components = $components;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @return array
     */
    public function getInputsXML()
    {
        return $this->inputsXML;
    }

    /**
     * @param array $inputs
     * @return $this
     */
    public function setInputsXML($inputs)
    {
        $this->inputsXML = $inputs;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @param ArrayCollection $inputs
     * @return $this
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
        return $this;
    }

    /**
     * @return RequirementCollection
     */
    public function getRequirementsXML()
    {
        return $this->requirementsXML;
    }

    /**
     * @param RequirementCollection $requirements
     * @return $this
     */
    public function setRequirementsXML($requirements)
    {
        $this->requirementsXML = $requirements;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @param ArrayCollection $requirements
     * @return $this
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
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
     * @param ArrayCollection $linkFlowSteps
     * @return $this
     */
    public function setLinkFlowSteps($linkFlowSteps)
    {
        $this->linkFlowSteps = $linkFlowSteps;
        return $this;
    }

    /**
     * @return Raci
     */
    public function getRaci()
    {
        return $this->raci;
    }

    /**
     * @param string $raci
     * @return $this
     */
    public function setRaci($raci)
    {
        $this->raci = $raci;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtmlText()
    {
        return $this->htmlText;
    }

    /**
     * @param string $htmlText
     * @return $this
     */
    public function setHtmlText($htmlText)
    {
        $this->htmlText = $htmlText;
        return $this;
    }

    /**
     * @return array
     */
    public function getWorkProductsXML()
    {
        return $this->workProductsXML;
    }

    /**
     * @param array $workProductsXML
     * @return $this
     */
    public function setWorkProductsXML($workProductsXML)
    {
        $this->workProductsXML = $workProductsXML;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getWorkProducts()
    {
        return $this->workProducts;
    }

    /**
     * @param ArrayCollection $workProducts
     * @return $this
     */
    public function setWorkProducts($workProducts)
    {
        $this->workProducts = $workProducts;
        return $this;
    }

    /**
     * @return array
     */
    public function getTestLabsXML()
    {
        return $this->testLabsXML;
    }

    /**
     * @param array $testLabsXML
     * @return $this
     */
    public function setTestLabsXML($testLabsXML)
    {
        $this->testLabsXML = $testLabsXML;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTestLabs()
    {
        return $this->testLabs;
    }

    /**
     * @param ArrayCollection $testLabs
     * @return $this
     */
    public function setTestLabs($testLabs)
    {
        $this->testLabs = $testLabs;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ArrayCollection $images
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
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