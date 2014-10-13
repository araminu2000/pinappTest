<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Application\Sonata\UserBundle\Entity\User;
use Cegeka\FlandersDriveBundle\Entity\User as UserXMLEntity;
use Cegeka\FlandersDriveBundle\Entity\Collection\GuidelineCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\UserCollection;
use Doctrine\DBAL\DBALException;

class UserHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($userArray)
    {
        $collection = new UserCollection();

        /** @var User $user */
        foreach ($userArray as $user) {
            $userEntity = new UserXMLEntity();
            $userEntity->setFlandersId($user->getFlandersId())
                ->setLogin($user->getUsername())
                ->setPassword($user->getPassword())
                ->setType($user->getType());

            if (null !== $user->getCompany()) {
                $userEntity->setReferenceCompanyId($user->getCompany()->getFlandersId());
            }

            $collection->add($userEntity);
        }

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return GuidelineCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\UserCollection', 'xml');

        /** @var UserXMLEntity $userEntity */
        foreach ($collection as $key => $userEntity) {
            $sonataUserEntity = new User();
            $sonataUserEntity->setType($userEntity->getType())
                ->setFlandersId($userEntity->getFlandersId())
                ->setCompany($this->finderGenerator->findCompanyOrGenerateIt($userEntity->getReferenceCompanyId()))
                ->setUsername($userEntity->getLogin())
                ->setPlainPassword($userEntity->getPassword())
                ->setEnabled(true)
                ->setEmail("{$userEntity->getLogin()}@flandersdrive.be");

            if ('admin' === $userEntity->getType()) {
                $sonataUserEntity->addRole('ROLE_SUPER_ADMIN');
            } else {
                $sonataUserEntity->addRole('ROLE_USER');
            }

            $this->manager->persist($sonataUserEntity);
        }

        $this->manager->flush();
    }
} 