<?php


namespace Cegeka\FlandersDriveBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Translation\Exception\InvalidResourceException;

class UserService {
    /**
     * @var ObjectManager
     */
    protected $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param $flandersId
     * @return \Application\Sonata\UserBundle\Entity\User[]|array
     * @throws \Symfony\Component\Translation\Exception\InvalidResourceException
     */
    public function findByFlandersId($flandersId) {
        $userEntity = $this->manager->getRepository('ApplicationSonataUserBundle:User')->findOneBy(['flandersId' => $flandersId]);

        if (null === $userEntity) {
            throw new InvalidResourceException("User entity '{$flandersId}' could not be found.");
        }

        return $userEntity;
    }
} 