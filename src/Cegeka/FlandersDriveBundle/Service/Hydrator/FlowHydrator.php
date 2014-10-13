<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\FlowCollection;

class FlowHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($flowArray)
    {
        $collection = new FlowCollection();
        $collection->setElements($flowArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return FlowCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\FlowCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 