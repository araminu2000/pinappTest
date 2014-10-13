<?php

namespace Pinapp\TracerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Holds duplicated information regarding an entity.
 * @package Pinapp\TracerBundle\Entity
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class EntityBase {
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @ORM\Column(type="datetime", name="created_at", nullable=true)
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at", nullable=true)
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /** @ORM\PrePersist */
    public function prePersistHook()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /** @ORM\PreUpdate */
    public function preUpdateHook()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @param mixed $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this->updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}