<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection;

class CompanyHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($companyArray)
    {
        $collection = new CompanyCollection();
        $collection->setElements($companyArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return CompanyCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 