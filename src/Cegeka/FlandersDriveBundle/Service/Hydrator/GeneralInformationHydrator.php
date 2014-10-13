<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\GeneralInformationCollection;
use Cegeka\FlandersDriveBundle\Entity\GeneralInformation;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Doctrine\Common\Collections\ArrayCollection;

class GeneralInformationHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($genInfoArray)
    {
        $collection = new GeneralInformationCollection();
        $collection->setElements($genInfoArray);

        /** @var GeneralInformation $entry */
        foreach ($collection as $entry) {
            $scopesCollection = $this->serializeScopes($entry);
            $normesCollection = $this->serializeNormes($entry);
            $requirementsCollection = $this->serializeGeneralRequirements($entry);

            $entry->setScopes($scopesCollection)
                ->setNormes($normesCollection)
                ->setGeneralRequirements($requirementsCollection);
        }

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return GeneralInformationCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\GeneralInformationCollection', 'xml');

        /** @var GeneralInformation $entry */
        foreach ($collection as $entry) {
            $scopesCollection = $this->deserializeScopes($entry);
            $normesCollection = $this->deserializeNormes($entry);
            $generalRequirementsCollection = $this->deserializeGeneralRequirements($entry);

            $entry->setScopes($scopesCollection)
                ->setNormes($normesCollection)
                ->setGeneralRequirements($generalRequirementsCollection);
        }

        return $this->persistCollection($collection);
    }

    /**
     * @param GeneralInformation $entry
     * @return ArrayCollection
     */
    protected function deserializeScopes($entry)
    {
        $scopes = $entry->getScopes();

        /** @var GeneralInformation\XML\Scope $scope */
        $scopesCollection = new ArrayCollection();
        foreach ($scopes as $scope) {
            $scopesCollection->add($this->finderGenerator->findRequirementOrGenerateIt($scope->getTag(), $scope->getChapterNumber(), $scope->getClauseNumber(), $scope->getPart()));
        }
        return $scopesCollection;
    }

    /**
     * @param GeneralInformation $entry
     * @return ArrayCollection
     */
    protected function deserializeNormes($entry)
    {
        $normes = $entry->getNormes();

        /** @var GeneralInformation\XML\Norm $norm */
        $normCollection = new ArrayCollection();
        foreach ($normes as $norm) {
            $normCollection->add($this->finderGenerator->findRequirementOrGenerateIt($norm->getTag(), $norm->getChapterNumber(), $norm->getClauseNumber(), $norm->getPart()));
        }
        return $normCollection;
    }

    /**
     * @param GeneralInformation $entry
     * @return ArrayCollection
     */
    protected function deserializeGeneralRequirements($entry)
    {
        $generalRequirements = $entry->getGeneralRequirements();

        /** @var GeneralInformation\XML\GeneralRequirement $generalRequirement */
        $generalRequirementsCollection = new ArrayCollection();
        foreach ($generalRequirements as $generalRequirement) {
            $generalRequirementsCollection->add($this->finderGenerator->findRequirementOrGenerateIt($generalRequirement->getTag(), $generalRequirement->getChapterNumber(), $generalRequirement->getClauseNumber(), $generalRequirement->getPart()));
        }
        return $generalRequirementsCollection;
    }

    /**
     * @param GeneralInformation $entry
     * @return ArrayCollection
     */
    protected function serializeScopes($entry)
    {
        $scopesCollection = new ArrayCollection();

        /** @var Requirement $scope */
        foreach ($entry->getScopes() as $scope) {
            $scopeEntity = new GeneralInformation\XML\Scope();
            $scopeEntity->setTag($scope->getTag())
                ->setChapterNumber($scope->getChapterNumber())
                ->setClauseNumber($scope->getClauseNumber())
                ->setPart($scope->getPart());

            $scopesCollection->add($scopeEntity);
        }
        return $scopesCollection;
    }

    /**
     * @param GeneralInformation $entry
     * @return ArrayCollection
     */
    protected function serializeNormes($entry)
    {
        $normesCollection = new ArrayCollection();

        /** @var Requirement $norm */
        foreach ($entry->getNormes() as $norm) {
            $normEntity = new GeneralInformation\XML\Norm();
            $normEntity->setTag($norm->getTag())
                ->setChapterNumber($norm->getChapterNumber())
                ->setClauseNumber($norm->getClauseNumber())
                ->setPart($norm->getPart());

            $normesCollection->add($normEntity);
        }

        return $normesCollection;
    }

    /**
     * @param GeneralInformation $entry
     * @return ArrayCollection
     */
    protected function serializeGeneralRequirements($entry)
    {
        $generalRequirementsCollection = new ArrayCollection();

        /** @var Requirement $generalRequirement */
        foreach ($entry->getNormes() as $generalRequirement) {
            $requirementEntity = new GeneralInformation\XML\GeneralRequirement();
            $requirementEntity->setTag($generalRequirement->getTag())
                ->setChapterNumber($generalRequirement->getChapterNumber())
                ->setClauseNumber($generalRequirement->getClauseNumber())
                ->setPart($generalRequirement->getPart());

            $generalRequirementsCollection->add($requirementEntity);
        }

        return $generalRequirementsCollection;
    }
} 