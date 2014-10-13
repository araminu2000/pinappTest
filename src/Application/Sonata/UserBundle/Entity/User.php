<?php

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;

class User extends BaseUser
{
    public function prePersist() {
        parent::prePersist();

        $this->enabled = true;
    }

    /**
     * @var integer $id
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}
