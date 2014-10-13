<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\RecommendationCollection;

class RecommendationHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($recommendationArray)
    {
        $collection = new RecommendationCollection();
        $collection->setElements($recommendationArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return RecommendationCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\RecommendationCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 