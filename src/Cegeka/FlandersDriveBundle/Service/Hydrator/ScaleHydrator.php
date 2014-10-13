<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Scale;

class ScaleHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($scale)
    {
        return $this->serializer->serialize($scale, 'xml');
    }

    /**
     * @inheritdoc
     * @return Scale
     */
    public function deserialize($xmlString)
    {
        /** @var Scale $scale */
        $scale = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Scale', 'xml');

        $this->persistCollection($scale->getActivityCollection()->toArray());
        $this->persistCollection($scale->getApplicationTypeCollection()->toArray());
        $this->persistCollection($scale->getBodyCollection()->toArray());
        $this->persistCollection($scale->getProcessCollection()->toArray());
        $this->persistCollection($scale->getRegionCollection()->toArray());
        $this->persistCollection($scale->getStandardCollection()->toArray());
        $this->persistCollection($scale->getProductTypeCollection()->toArray());
    }
} 