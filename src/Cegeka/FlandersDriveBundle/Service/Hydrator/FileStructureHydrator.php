<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\NoteCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Requirement\AddInfoCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\RequirementCollection;
use Cegeka\FlandersDriveBundle\Entity\FileStructure;
use Cegeka\FlandersDriveBundle\Entity\Note;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Cegeka\FlandersDriveBundle\Service\FinderGenerator;
use Cegeka\FlandersDriveBundle\Service\UserService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use JMS\Serializer\Serializer;

class FileStructureHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($fullStructure)
    {
        /** @var FileStructure\Group $group */
        foreach ($fullStructure->getGroups() as $group) {
            $group->setStructure($fullStructure);

            /** @var FileStructure\Substructure $substructure */
            foreach ($group->getSubstructures() as $substructure) {

                if (null !== $substructure->getAfterReference()) {
                    $substructure->setAfterId($substructure->getAfterReference()->getFlandersId());
                }

                if (null !== $substructure->getReferencedProcess()) {
                    $substructure->setReferencedProcessId($substructure->getReferencedProcess()->getFlandersId());
                }

                if (null !== $substructure->getAfterYesReference()) {
                    $substructure->setAfterYesId($substructure->getAfterYesReference()->getFlandersId());
                }

                if (null !== $substructure->getAfterNoReference()) {
                    $substructure->setAfterNoId($substructure->getAfterNoReference()->getFlandersId());
                }
            }
        }

        return $this->serializer->serialize($fullStructure, 'xml');
    }

    /**
     * @inheritdoc
     * @return FileStructure
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\FileStructure', 'xml');

        /** @var FileStructure\Group $group */
        foreach ($collection->getGroups() as $group) {
            $group->setStructure($collection);

            /** @var FileStructure\Substructure $substructure */
            foreach ($group->getSubstructures() as $substructure) {
                $substructure->setGroup($group);
                $substructure->setAfterReference($this->finderGenerator->findFlowOrGenerateIt($substructure->getAfterId()));
                $substructure->setReferencedProcess($this->finderGenerator->findFlowOrGenerateIt($substructure->getReferencedProcessId()));
                $substructure->setAfterYesReference($this->finderGenerator->findFlowOrGenerateIt($substructure->getAfterYesId()));
                $substructure->setAfterNoReference($this->finderGenerator->findFlowOrGenerateIt($substructure->getAfterNoId()));
            }
        }

        $this->persistEntity($collection);
        return $collection;
    }
} 