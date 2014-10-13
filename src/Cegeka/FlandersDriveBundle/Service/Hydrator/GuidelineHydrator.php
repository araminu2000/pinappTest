<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\GuidelineCollection;

class GuidelineHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($guidelineArray)
    {
        $collection = new GuidelineCollection();
        $collection->setElements($guidelineArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return GuidelineCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\GuidelineCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 