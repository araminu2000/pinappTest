<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\MaterialCollection;

class MaterialHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($materialArray)
    {
        $collection = new MaterialCollection();
        $collection->setElements($materialArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return MaterialCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\MaterialCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 