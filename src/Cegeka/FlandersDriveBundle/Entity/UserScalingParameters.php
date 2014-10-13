<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Application\Sonata\UserBundle\Entity\User as SonataUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_scaling_parameters")
 */
class UserScalingParameters extends EntityBase
{
    public function __construct()
    {
        $this->activities = $this->applicationTypes = $this->bodies = $this->processes = $this->productTypes = $this->regions = $this->tags = json_encode([]);
    }

    /**
     * @var SonataUser
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist","remove"})
     * @Assert\NotNull
     */
    protected $user;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $activities;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $applicationTypes;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $bodies;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $processes;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $productTypes;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $regions;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $tags;

    /**
     * @param mixed $activities
     *
     * @return $this
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivities()
    {
        return $this->activities;
    }

    public function getActivitiesArray()
    {
        return json_decode($this->activities);
    }

    /**
     * @param string $applicationTypes
     *
     * @return $this
     */
    public function setApplicationTypes($applicationTypes)
    {
        $this->applicationTypes = $applicationTypes;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationTypes()
    {
        return $this->applicationTypes;
    }

    public function getApplicationTypesArray()
    {
        return json_decode($this->applicationTypes);
    }

    /**
     * @param string $bodies
     *
     * @return $this
     */
    public function setBodies($bodies)
    {
        $this->bodies = $bodies;
        return $this;
    }

    /**
     * @return string
     */
    public function getBodies()
    {
        return $this->bodies;
    }

    public function getBodiesArray()
    {
        return json_decode($this->bodies);
    }

    /**
     * @param string $processes
     *
     * @return $this
     */
    public function setProcesses($processes)
    {
        $this->processes = $processes;
        return $this;
    }

    /**
     * @return string
     */
    public function getProcesses()
    {
        return $this->processes;
    }

    public function getProcessesArray()
    {
        return json_decode($this->processes);
    }

    /**
     * @param string $productTypes
     *
     * @return $this
     */
    public function setProductTypes($productTypes)
    {
        $this->productTypes = $productTypes;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductTypes()
    {
        return $this->productTypes;
    }

    public function getProductTypesArray()
    {
        return json_decode($this->productTypes);
    }

    /**
     * @param string $regions
     *
     * @return $this
     */
    public function setRegions($regions)
    {
        $this->regions = $regions;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegions()
    {
        return $this->regions;
    }

    public function getRegionsArray()
    {
        return json_decode($this->regions);
    }

    /**
     * @param string $tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function getTagsArray()
    {
        return json_decode($this->tags);
    }

    /**
     * @param SonataUser $user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return SonataUser
     */
    public function getUser()
    {
        return $this->user;
    }

    public function toArrayScalingParameters()
    {
        return [
            'activities' => $this->getActivitiesArray(),
            'applicationTypes' => $this->getApplicationTypesArray(),
            'bodies' => $this->getBodiesArray(),
            'processes' => $this->getProcessesArray(),
            'productTypes' => $this->getProductTypesArray(),
            'regions' => $this->getRegionsArray(),
            'tags' => $this->getTagsArray(),
        ];
    }


}