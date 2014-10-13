<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\ComponentCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\ReleaseCollection;

class ReleaseHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($releaseArray)
    {
        $collection = new ReleaseCollection();
        $collection->setElements($releaseArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return ReleaseCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\ReleaseCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 