<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\CompanyCollection;
use Cegeka\FlandersDriveBundle\Entity\Company;
use Cegeka\FlandersDriveBundle\Entity\Decision;

class DecisionHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     * @param Decision $decisionEntity
     */
    public function serialize($decisionEntity)
    {
        $decisionEntity->setProcessOwnerId($decisionEntity->getProcessOwner()->getFlandersId());
        return $this->serializer->serialize($decisionEntity, 'xml');
    }

    /**
     * @inheritdoc
     * @return Decision
     */
    public function deserialize($xmlString)
    {
        /** @var Decision $decision */
        $decision = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Decision', 'xml');
        $decision->setProcessOwner($this->finderGenerator->findCompanyOrGenerateIt($decision->getProcessOwnerId()));

        $this->manager->persist($decision);
        $this->manager->flush();

        return $decision;
    }
} 