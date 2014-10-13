<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Cegeka\FlandersDriveBundle\Entity\Company;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;

/**
 * This file has been generated by the Sonata EasyExtends bundle ( http://sonata-project.org/bundles/easy-extends )
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
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
     * @var string
     */
    protected $flandersId;

    /**
     * @var Company
     */
    protected $company;

    /**
     * @var string
     */
    protected $type;

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
     * @param \Cegeka\FlandersDriveBundle\Entity\Company $company
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $flandersId
     * @return $this
     */
    public function setFlandersId($flandersId)
    {
        $this->flandersId = $flandersId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlandersId()
    {
        return $this->flandersId;
    }
}