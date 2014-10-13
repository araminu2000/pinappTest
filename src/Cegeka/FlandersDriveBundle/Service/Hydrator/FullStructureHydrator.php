<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\NoteCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Requirement\AddInfoCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\RequirementCollection;
use Cegeka\FlandersDriveBundle\Entity\FileStructure;
use Cegeka\FlandersDriveBundle\Entity\FullStructure;
use Cegeka\FlandersDriveBundle\Entity\Note;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Cegeka\FlandersDriveBundle\Service\FinderGenerator;
use Cegeka\FlandersDriveBundle\Service\UserService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use JMS\Serializer\Serializer;

class FullStructureHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     * @var FullStructure $fullStructure
     */
    public function serialize($fullStructure)
    {
        return $this->serializer->serialize($fullStructure, 'xml');
    }

    /**
     * @inheritdoc
     * @return FullStructure
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\FullStructure', 'xml');

        /** @var FullStructure\Group $group */
        foreach ($collection->getGroups() as $group) {
            $group->setStructure($collection);

            /** @var FullStructure\Substructure $substructure */
            foreach ($group->getSubstructures() as $substructure) {
                $substructure->setGroup($group);
            }
        }

        $this->persistEntity($collection);
        return $collection;
    }
} 