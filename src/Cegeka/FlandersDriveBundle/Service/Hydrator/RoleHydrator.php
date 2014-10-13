<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\RoleCollection;

class RoleHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($rolesArray)
    {
        $collection = new RoleCollection();
        $collection->setElements($rolesArray);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return RoleCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\RoleCollection', 'xml');
        return $this->persistCollection($collection);
    }
} 