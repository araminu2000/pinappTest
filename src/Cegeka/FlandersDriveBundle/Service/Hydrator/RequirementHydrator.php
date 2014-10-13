<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Requirement\AddInfoCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\RequirementCollection;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Doctrine\Common\Collections\ArrayCollection;

class RequirementHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($requirementsArray)
    {
        $collection = new RequirementCollection();
        $collection->setElements($requirementsArray);
        $this->handleStringReferencesOnSerialize($collection);

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return RequirementCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\RequirementCollection', 'xml');

        /** @var $requirement \Cegeka\FlandersDriveBundle\Entity\Requirement */
        foreach ($collection as $requirement) {
            $scalingTagValue = $requirement->getScalingTag()->getValue();
            $requirement->getScalingTag()->setValue(preg_replace('#\n#is', ' ', $scalingTagValue));
        }
        $this->handleStringReferencesOnDeserialize($collection);
        return $this->persistCollection($collection);
    }

    public function handleStringReferencesOnDeserialize(RequirementCollection $collection)
    {
        /** @var Requirement $requirement */
        foreach ($collection as $requirement) {
            $clauseContent = $requirement->getClauseContent();
            $clauseContent = str_replace('../../5_standards', '/standards/', $clauseContent);
            $requirement->setClauseContent($clauseContent);
        }
    }

    public function handleStringReferencesOnSerialize(RequirementCollection $collection)
    {
        /** @var Requirement $requirement */
        foreach ($collection as $requirement) {
            $clauseContent = $requirement->getClauseContent();
            $clauseContent = str_replace('/standards/', '../../5_standards', $clauseContent);
            $requirement->setClauseContent($clauseContent);
        }
    }
} 