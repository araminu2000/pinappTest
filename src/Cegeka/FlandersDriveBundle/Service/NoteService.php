<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Cegeka\FlandersDriveBundle\Entity\Note;
use Doctrine\Common\Persistence\ObjectManager;

class NoteService
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var SearchService
     */
    protected $searchService;

    public function __construct(ObjectManager $manager, SearchService $searchService)
    {
        $this->manager = $manager;
        $this->searchService = $searchService;
    }

    public function deleteNote($id)
    {
        $note = $this->manager->getRepository('CegekaFlandersDriveBundle:Note')->find($id);
        $this->manager->remove($note);
        $this->manager->flush();
    }

    public function updateNote($id, $content)
    {
        $note = $this->manager->getRepository('CegekaFlandersDriveBundle:Note')->find($id);
        $note->setContent($content);

        $this->manager->persist($note);
        $this->manager->flush();

        return $note;
    }

    public function getStepNote($user, $step)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Note')->findOneBy([
            'referenceUser' => $user,
            'step' => $step
        ]);
    }

    public function getFlowNote($user, $flow)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Note')->findOneBy([
            'referenceUser' => $user,
            'flow' => $flow,
        ]);
    }

    public function addNote($user, $type, $subject, $content)
    {
        $note = new Note();

        $note->setReferenceUser($user)
            ->setSubject($subject)
            ->setContent($content)
            ->setDate(new \DateTime('now'))
            ->setType($type);

        if ('flow' == $type) {
            $note->setFlow($this->searchService->searchFlowByName($subject));
        } else {
            $note->setStep($this->searchService->searchStepByTitle($subject));
        }

        $this->manager->persist($note);
        $this->manager->flush();

        return $note;
    }
} 