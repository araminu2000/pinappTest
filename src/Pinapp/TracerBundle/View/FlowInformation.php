<?php

namespace Pinapp\TracerBundle\View;


class FlowInformation
{

    /** @var array */
    protected $requirements;

    /** @var array */
    protected $recommendations;

    /** @var array */
    protected $materials;

    /** @var array */
    protected $components;

    /** @var array */
    protected $testlabs;

    /** @var array */
    protected $inputs;

    /** @var  array */
    protected $workproducts;

    /** @var  array */
    protected $linkFlowSteps;

    /** @var  array */
    protected $images;

    public function __construct()
    {
        $this->requirements = array();
        $this->recommendations = array();
        $this->materials = array();
        $this->components = array();
        $this->testlabs = array();
        $this->inputs = [];
        $this->workproducts = [];
        $this->linkFlowSteps = [];
        $this->images = [];
    }

    /**
     * @return array
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @param array $requirements
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    /**
     * @return array
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }

    /**
     * @param array $recommendations
     */
    public function setRecommendations($recommendations)
    {
        $this->recommendations = $recommendations;
    }

    /**
     * @param array $materials
     */
    public function setMaterials($materials)
    {
        $this->materials = $materials;
    }

    /**
     * @return array
     */
    public function getMaterials()
    {
        return $this->materials;
    }

    /**
     * @param array $components
     */
    public function setComponents($components)
    {
        $this->components = $components;
    }

    /**
     * @return array
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @return array
     */
    public function getTestlabs()
    {
        return $this->testlabs;
    }

    /**
     * @param array $testlabs
     */
    public function setTestlabs($testlabs)
    {
        $this->testlabs = $testlabs;
    }

    /**
     * @param array $requirements
     */
    public function addRequirements(array $requirements)
    {
        $this->requirements = array_unique(array_merge($this->requirements, $requirements));
    }

    /**
     * @param array $recommendations
     */
    public function addRecommendations(array $recommendations)
    {
        $this->recommendations = array_unique(array_merge($this->recommendations, $recommendations));
    }

    /**
     * @param array $materials
     */
    public function addMaterials(array $materials)
    {
        $this->materials = array_unique(array_merge($this->materials, $materials));
    }

    /**
     * @param array $components
     */
    public function addComponents(array $components)
    {
        $this->components = array_unique(array_merge($this->components, $components));
    }

    /**
     * @param array $testlabs
     */
    public function addTestlabs(array $testlabs)
    {
        $this->testlabs = array_unique(array_merge($this->testlabs, $testlabs));
    }

    public function addWorkproducts(array $workproducts)
    {
        $this->workproducts = array_unique(array_merge($this->workproducts, $workproducts));
    }

    public function addInputs(array $inputs)
    {
        $this->inputs = array_unique(array_merge($this->inputs, $inputs));
    }

    public function addLinkFlowSteps(array $linkFlowSteps)
    {
        $this->linkFlowSteps = array_unique(array_merge($this->linkFlowSteps, $linkFlowSteps));
    }

    public function addImages(array $images)
    {
        $this->images = array_unique(array_merge($this->images, $images));
    }

    /**
     * @param FlowInformation $info
     */
    public function merge(FlowInformation $info)
    {
        $this->addRequirements($info->getRequirements());
        $this->addRecommendations($info->getRecommendations());
        $this->addMaterials($info->getMaterials());
        $this->addComponents($info->getComponents());
        $this->addTestlabs($info->getTestlabs());
        $this->addInputs($info->getInputs());
        $this->addWorkproducts($info->getWorkproducts());
        $this->addInputs($info->getInputs());
        $this->addLinkFlowSteps($info->getLinkFlowSteps());
        $this->addImages($info->getImages());
    }

    /**
     * @param array $workproducts
     * @return $this
     */
    public function setWorkproducts($workproducts)
    {
        $this->workproducts = $workproducts;
        return $this;
    }

    /**
     * @return array
     */
    public function getWorkproducts()
    {
        return $this->workproducts;
    }

    /**
     * @param array $inputs
     * @return $this
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
        return $this;
    }

    /**
     * @return array
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @param array $linkFlowSteps
     * @return $this
     */
    public function setLinkFlowSteps($linkFlowSteps)
    {
        $this->linkFlowSteps = $linkFlowSteps;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinkFlowSteps()
    {
        return $this->linkFlowSteps;
    }

    /**
     * @param array $images
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }


}