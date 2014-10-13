<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\ComponentCollection;

class ComponentHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($componentArray)
    {
        $collection = new ComponentCollection();
        $collection->setElements($componentArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return ComponentCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\ComponentCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 