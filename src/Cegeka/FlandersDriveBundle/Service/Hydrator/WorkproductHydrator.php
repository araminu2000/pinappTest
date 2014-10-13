<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\WorkproductCollection;

class WorkproductHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($workproductArray)
    {
        $collection = new WorkproductCollection();
        $collection->setElements($workproductArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return WorkproductCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\WorkproductCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 