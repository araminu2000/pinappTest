<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;

class ReleaseService
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function getNewestRelease()
    {
        $releases = $this->manager->getRepository('CegekaFlandersDriveBundle:Release')->findBy([], [
            'date' => 'DESC',
        ]);

        return empty($releases[0]) ? null : $releases[0];
    }

    public function findAll()
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Release')->findBy([], [
            'date' => 'DESC',
        ]);
    }
} 