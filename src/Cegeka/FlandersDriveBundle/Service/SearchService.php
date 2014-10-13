<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Cegeka\FlandersDriveBundle\Entity\GeneralInformation;
use Doctrine\Common\Persistence\ObjectManager;

class SearchService
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function searchFlowByName($name)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Flow')->findOneBy([
            'name' => $name,
        ]);
    }

    public function searchStepByTitle($title)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Step')->findOneBy([
            'title' => $title
        ]);
    }

    public function searchRequirementsByTestTypeAndTag($testType, $tag)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Requirement')->findBy([
            'testType' => $testType,
            'tag' => $tag
        ]);
    }

    public function searchRequirementsByTestType($testType)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Requirement')->findBy([
            'testType' => $testType,
        ]);
    }

    public function searchGeneralInformationByRequirementStandard($standard)
    {
        $genInfoEntriesToReturn = [];

        $generalInformationEntries = $this->manager->getRepository('CegekaFlandersDriveBundle:GeneralInformation')->findAll();

        /** @var GeneralInformation $entry */
        foreach ($generalInformationEntries as $entry) {
            if ($this->standardExistsInGeneralInfo($standard, $entry)) {
                $genInfoEntriesToReturn[] = $entry;
            }
        }

        return $genInfoEntriesToReturn;
    }

    /**
     * @param $standard
     * @param $entry
     * @return bool
     */
    protected function standardExistsInGeneralInfo($standard, $entry)
    {
        foreach ($entry->getScopes() as $scope) {
            if ($standard === $scope->getTag()) {
                return true;
            }
        }

        foreach ($entry->getNormes() as $norm) {
            if ($standard === $norm->getTag()) {
                return true;
            }
        }

        foreach ($entry->getGeneralRequirements() as $requirement) {
            if ($standard === $requirement->getTag()) {
                return true;
            }
        }

        return false;
    }
} 