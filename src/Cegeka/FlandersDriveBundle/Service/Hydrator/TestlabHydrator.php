<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\TestlabCollection;
use Cegeka\FlandersDriveBundle\Entity\Testlab;

class TestlabHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($testlabArray)
    {
        $collection = new TestlabCollection();
        $collection->setElements($testlabArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return TestlabCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\TestlabCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 