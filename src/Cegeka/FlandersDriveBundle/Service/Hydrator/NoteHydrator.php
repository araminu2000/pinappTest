<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\NoteCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Requirement\AddInfoCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\RequirementCollection;
use Cegeka\FlandersDriveBundle\Entity\Note;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Cegeka\FlandersDriveBundle\Service\FinderGenerator;
use Cegeka\FlandersDriveBundle\Service\SearchService;
use Cegeka\FlandersDriveBundle\Service\UserService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use JMS\Serializer\Serializer;
use Symfony\Component\Translation\Exception\InvalidResourceException;

class NoteHydrator extends HydratorBase
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var SearchService
     */
    protected $searchService;

    /**
     * @param ObjectManager $manager
     * @param Serializer $serializer
     * @param FinderGenerator $finderGenerator
     * @param UserService $userService
     * @param SearchService $searchService
     */
    public function __construct(ObjectManager $manager, Serializer $serializer, FinderGenerator $finderGenerator, UserService $userService, SearchService $searchService)
    {
        parent::__construct($manager, $serializer, $finderGenerator);
        $this->userService = $userService;
        $this->searchService = $searchService;
    }

    /**
     * @inheritdoc
     */
    public function serialize($requirementsArray)
    {
        $collection = new NoteCollection();
        $collection->setElements($requirementsArray);

        /** @var Note $note */
        foreach ($collection as $note) {
            $note->setReferenceUserId($note->getReferenceUser()->getFlandersId());

            if ('flow' == $note->getType()) {
                if (!empty($note->getFlow())) {
                    $note->setSubject($note->getFlow()->getName());
                }
            } else if ('step' == $note->getType()) {
                if (!empty($note->getStep())) {
                    $note->setSubject($note->getStep()->getTitle());
                }
            } else {
                throw new InvalidResourceException('Invalid type provided for note.');
            }
        }

        return $this->serializer->serialize($collection, 'xml');
    }

    /**
     * @inheritdoc
     * @return RequirementCollection
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Collection\NoteCollection', 'xml');

        /** @var Note $note */
        foreach ($collection as $note) {
            $userEntity = $this->userService->findByFlandersId($note->getReferenceUserId());
            $note->setReferenceUser($userEntity);

            if ('flow' == $note->getType()) {
                $note->setFlow($this->searchService->searchFlowByName($note->getSubject()));
            } else if ('step' == $note->getType()) {
                $note->setStep($this->searchService->searchStepByTitle($note->getSubject()));
            } else {
                throw new InvalidResourceException('Invalid type provided for note.');
            }
        }

        return $this->persistCollection($collection);
    }
} 