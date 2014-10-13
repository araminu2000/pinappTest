<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;

class DetailService
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function findUserScalingParametersByUser($user)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:UserScalingParameters')->findOneBy([
            'user' => $user,
        ]);
    }

    public function findFlowByFlandersId($flandersId)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Flow')->findOneBy([
            'flandersId' => $flandersId,
        ]);
    }

    public function findGeneralInformationById($flandersId)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:GeneralInformation')->findOneBy([
            'flandersId' => $flandersId,
        ]);
    }

    public function findStepById($id)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Step')->find($id);
    }

    public function findRequirementById($id)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Requirement')->find($id);
    }

    public function findTestLabByFlandersId($flandersId)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Testlab')->findOneBy([
            'flandersId' => $flandersId
        ]);
    }

    public function findComponentByFlandersId($flandersId)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Component')->findOneBy([
            'flandersId' => $flandersId,
        ]);
    }

    public function findMaterialByFlandersId($flandersId)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Material')->findOneBy([
            'flandersId' => $flandersId,
        ]);
    }

    public function findRecommendationByFlandersId($flandersId)
    {
        return $this->manager->getRepository('CegekaFlandersDriveBundle:Recommendation')->findOneBy([
            'flandersId' => $flandersId,
        ]);
    }
} 