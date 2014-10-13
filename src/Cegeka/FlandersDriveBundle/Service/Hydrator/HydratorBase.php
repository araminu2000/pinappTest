<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Cegeka\FlandersDriveBundle\Service\FinderGenerator;
use Doctrine\Common\Persistence\ObjectManager;
use JMS\Serializer\Serializer;

abstract class HydratorBase
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var FinderGenerator
     */
    protected $finderGenerator;

    public function __construct(ObjectManager $manager, Serializer $serializer, FinderGenerator $finderGenerator)
    {
        $this->manager = $manager;
        $this->serializer = $serializer;
        $this->finderGenerator = $finderGenerator;
    }

    /**
     * Serialize an entity into XML.
     * @return string
     */
    abstract public function serialize($entity);

    /**
     * Deserialize an entity.
     * @param string $xmlString XML String from which data is deserialized.
     */
    abstract public function deserialize($xmlString);

    /**
     * To be used for collections that do not need to be stored in the DB, but are required for serialization.
     * @param array $collection
     */
    public function persistCollection($collection)
    {
        foreach ($collection as $entry) {
            $this->manager->persist($entry);
        }

        return $this->manager->flush();
    }

    public function persistEntity($entity)
    {
        $this->manager->persist($entity);
        $this->manager->flush();
    }
} 