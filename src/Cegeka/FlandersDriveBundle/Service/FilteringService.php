<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Cegeka\FlandersDriveBundle\Entity\Collection\BaseCollection;
use Cegeka\FlandersDriveBundle\Entity\Collection\Step\ParagraphCollection;
use Cegeka\FlandersDriveBundle\Entity\Decision;
use Cegeka\FlandersDriveBundle\Entity\FileStructure\Group;
use Cegeka\FlandersDriveBundle\Entity\FileStructure\Substructure;
use Cegeka\FlandersDriveBundle\Entity\Flow;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Cegeka\FlandersDriveBundle\Entity\Step;
use Cegeka\FlandersDriveBundle\View\FlowInformation;
use Cegeka\SymfonyToolkitBundle\Entity\EntityBase;
use Symfony\Component\HttpFoundation\Session\Session;

class FilteringService
{

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var array
     */
    protected $criteria;

    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->criteria = $this->session->get('scalingParameters');
    }

    /**
     * Return true (not disabled) if at least one step / decision is enabled
     * @param Flow $flow
     *
     * @return bool
     */
    public function filterFlow(Flow $flow)
    {
        $groups = $flow->getFileStructure()->getGroups();
        return $this->filterGroups($groups);
    }

    public function filterDecision(Decision $decision)
    {
        $methods = [
            'getActivity' => 'activities',
            'getProductType' => 'productTypes',
            'getProcess' => 'processes',
        ];

        foreach ($methods as $method => $arrayKey) {
            if (!empty($this->criteria[$arrayKey]) && method_exists($decision, $method)) {
                if (null === $decision->$method()) {
                    continue;
                }

                if (!$this->criteriaSubstringMatches($decision->$method()->getValue(), $this->criteria[$arrayKey])) {
                    return false;
                }
            }
        }

        return true;
    }

    public function filterStep(Step $step)
    {
        $methods = [
            'getScalingProcess' => 'processes',
        ];

        foreach ($methods as $method => $arrayKey) {
            if (!empty($this->criteria[$arrayKey]) && method_exists($step, $method)) {
                if (null === $step->$method()) {
                    continue;
                }

                if (!$this->criteriaSubstringMatches($step->$method()->getValue(), $this->criteria[$arrayKey])) {
                    return false;
                }
            }
        }

        return $this->filterStepAssociation($step);
    }

    public function filterStepAssociation(Step $step)
    {
        $paragraphs = $step->getDescription()->toArray();
        if (empty($paragraphs)) {
            return true;
        }
        $paragraphs = $this->filterParagraphsArray($step->getDescription()->toArray());
        if (empty($paragraphs)) {
            return false;
        }

        $paragraphCollection = new ParagraphCollection();
        $paragraphCollection->setElements($paragraphs);

        $step->setDescription($paragraphCollection);

        return true;
    }

    public function filterParagraphsArray(array $paragraphs)
    {
        /** @var Step\Paragraph $paragraph */
        foreach ($paragraphs as $key => $paragraph) {
            if (!$this->filterParagraph($paragraph)) {
                unset($paragraphs[$key]);
            }
        }

        return $paragraphs;
    }

    public function filterParagraph(Step\Paragraph $paragraph)
    {
        $requirements = $paragraph->getRequirements();

        if (!$this->filterScalingParametersInGeneral($paragraph)) {
            return false;
        }

        if (empty($requirements->toArray())) {
            return true;
        }
        $requirements = $this->filterRequirementsArray($requirements->toArray());
        if (empty($requirements)) {
            return false;
        }

        $requirementCollection = new BaseCollection();
        $requirementCollection->setElements($requirements);

        $paragraph->setRequirements($requirementCollection);

        return true;
    }

    /**
     * @param Substructure $substructure
     * @return bool
     */
    public function filterSubstructureScaledTo(Substructure $substructure)
    {
        if (empty($substructure->getScaledTo())) {
            return true;
        } else {
            return $this->criteriaSubstringMatches($substructure->getScaledTo(), $this->criteria['productTypes']);
        }
    }


    public function processFlowInfoAssociations($flowInfo)
    {
        $associations = [
            'setRecommendations' => 'getRecommendations',
            'setMaterials'       => 'getMaterials',
            'setComponents'      => 'getComponents',
            'setTestlabs'        => 'getTestlabs',
        ];

        if ($flowInfo instanceof FlowInformation) {
            foreach ($associations as $setter => $getter) {
                if (!empty($flowInfo->$getter())) {
                    $flowInfo->$setter($this->filterScalingParametersGeneralArray($flowInfo->$getter()));
                }
            }

            if (!empty($flowInfo->getRequirements())) {
                $flowInfo->setRequirements($this->filterRequirementsArray($flowInfo->getRequirements()));
            }
        }

        return $flowInfo;
    }

    public function filterRequirementsArray(array $requirements)
    {
        /** @var Requirement $requirement */
        foreach ($requirements as $key => $requirement) {
            if (!$this->filterRequirement($requirement)) {
                unset($requirements[$key]);
            }
        }

        return $requirements;
    }

    public function filterRequirement(Requirement $requirement)
    {
        $methods = [
            'getScalingRegion'          => 'regions',
            'getScalingApplicationType' => 'applicationTypes',
            'getScalingProductType'     => 'productTypes',
            'getScalingTag'             => 'tags',
            'getScalingBody'            => 'bodies',
            'getScalingProcess'         => 'processes',
        ];

        foreach ($methods as $method => $arrayKey) {
            if (!empty($this->criteria[$arrayKey]) && method_exists($requirement, $method)) {
                    if (null === $requirement->$method()) {
                        continue;
                    }
                if (!$this->criteriaSubstringMatches($requirement->$method()->getValue(), $this->criteria[$arrayKey])) {
                    return false;
                }
            }
        }

        return true;
    }

    public function filterScalingParametersGeneralArray(array $entities)
    {
        /** @var EntityBase $entity */
        foreach ($entities as $key => $entity) {
            if (!$this->filterScalingParametersInGeneral($entity)) {
                unset($entities[$key]);
            }
        }

        return $entities;
    }

    /**
     * @param EntityBase $entity
     *
     * @return bool
     */
    public function filterScalingParametersInGeneral($entity)
    {
        $methods = [
            'getProductType' => 'productTypes',
            'getProcess'     => 'processes',
            'getRegion'      => 'regions',
            'getActivity'    => 'activities',
        ];

        foreach ($methods as $method => $arrayKey) {
            if (!empty($this->criteria[$arrayKey]) && method_exists($entity, $method)) {
                if (null === $entity->$method()) {
                    continue;
                }

                if (!$this->criteriaSubstringMatches($entity->$method()->getValue(), $this->criteria[$arrayKey])) {
                    return false;
                }
            }
        }

        return true;
    }

    protected function criteriaSubstringMatches($value, $criteria)
    {
        $value = str_replace("\n", ' ', $value);

        if (empty($criteria)) {
            return true;
        }

        foreach ($criteria as $entry) {
            if (false !== strstr($value, $entry)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $groups
     * @return bool
     */
    public function filterGroups($groups)
    {
        /**
         * @var Group $group
         * @var Substructure $substructure
         */
        foreach ($groups as $group) {
            foreach ($group->getSubstructures() as $substructure) {
                if (!$this->filterSubstructureScaledTo($substructure)) {
                    return false;
                } else {
                    if ('step' === $substructure->getType() && $this->filterStep($substructure->getReferencedProcess()->getStep())) {
                        return true;
                    }

                    if ('decision' === $substructure->getType() && $this->filterDecision($substructure->getReferencedProcess()->getDecision())) {
                        return true;
                    }
                }
            }

        }

        return false;
    }
} 