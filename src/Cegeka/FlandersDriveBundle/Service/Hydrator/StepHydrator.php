<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Collection\Step\ParagraphCollection;
use Cegeka\FlandersDriveBundle\Entity\Step\Raci;
use Cegeka\FlandersDriveBundle\Entity\Step;
use Doctrine\Common\Collections\ArrayCollection;

class StepHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     * @param Step $stepEntity
     */
    public function serialize($stepEntity)
    {
        if (!empty($stepEntity->getProcessOwner()) && null !== $stepEntity->getProcessOwner()->getFlandersId()) {
            $stepEntity->setProcessOwnerId($stepEntity->getProcessOwner()->getFlandersId());
        }

        /** @var Step\Paragraph $paragraph */
        foreach ($stepEntity->getDescription() as $paragraph) {

            $materialsArray = [];
            foreach ($paragraph->getMaterials() as $material) {
                $materialsArray[] = $material->getFlandersId();
            }
            $paragraph->setMaterialsXML($materialsArray);

            $recommendationsArray = [];
            foreach ($paragraph->getRecommendations() as $recommendation) {
                $recommendationsArray[] = $recommendation->getFlandersId();
            }
            $paragraph->setRecommendationsXML($recommendationsArray);

            $componentsArray = [];
            foreach ($paragraph->getComponents() as $component) {
                $componentsArray[] = $component->getFlandersId();
            }
            $paragraph->setComponentsXML($componentsArray);

            $workproductsArray = [];
            foreach ($paragraph->getWorkProducts() as $workproduct) {
                $workproductsArray[] = $workproduct->getTag();
            }
            $paragraph->setWorkProductsXML($workproductsArray);

            $testlabsArray = [];
            foreach ($paragraph->getTestLabs() as $testlab) {
                $testlabsArray[] = $testlab->getFlandersId();
            }
            $paragraph->setTestLabsXML($testlabsArray);

            $inputsArray = [];
            foreach ($paragraph->getInputs() as $input) {
                $inputsArray[] = $input->getTag();
            }
            $paragraph->setInputsXML($inputsArray);

            if (null !== $paragraph->getRaci()) {
                $this->serializeRaci($paragraph->getRaci());
            }
        }

        $paragraphCollection = new ParagraphCollection();
        $paragraphCollection->setElements($stepEntity->getDescription()->toArray());
        $stepEntity->setDescription($paragraphCollection);

        return $this->serializer->serialize($stepEntity, 'xml');
    }

    /**
     * @inheritdoc
     * @param Raci $raci
     */
    public function serializeRaci($raci)
    {
        $personResponsibleArray = [];
        foreach ($raci->getPeopleResponsible() as $personResponsible) {
            $personResponsibleArray[] = $personResponsible->getPerson();
        }
        $raci->setPeopleResponsibleXML($personResponsibleArray);

        $personConsultedArray = [];
        foreach ($raci->getPeopleConsulted() as $personConsulted) {
            $personConsultedArray[] = $personConsulted->getPerson();
        }
        $raci->setPeopleConsultedXML($personConsultedArray);

        $personInformedArray = [];
        foreach ($raci->getPeopleInformed() as $personInformed) {
            $personInformedArray[] = $personInformed->getPerson();
        }
        $raci->setPeopleInformedXML($personInformedArray);

        $personAccountableArray = [];
        foreach ($raci->getPeopleAccountable() as $personAccountable) {
            $personAccountableArray[] = $personAccountable->getPerson();
        }
        $raci->setPeopleAccountableXML($personAccountableArray);
    }

    /**
     * @inheritdoc
     * @return Step
     */
    public function deserialize($xmlString)
    {
        /** @var Step $step */
        $step = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Step', 'xml');
        $step->setProcessOwner($this->finderGenerator->findCompanyOrGenerateIt($step->getProcessOwnerId()));

        if (null !== $step->getDescription()) {
            /** @var Step\Paragraph $paragraph */
            foreach ($step->getDescription() as $paragraph) {
                $paragraph->setStep($step);

                $materialCollection = new ArrayCollection();
                $materialsArray = $paragraph->getMaterialsXML();
                foreach ($materialsArray as $materialFlandersId) {
                    $materialCollection->add($this->finderGenerator->findMaterialOrGenerateIt($materialFlandersId));
                }
                $paragraph->setMaterials($materialCollection);

                $recommendationCollection = new ArrayCollection();
                $recommendationArray = $paragraph->getRecommendationsXML();
                foreach ($recommendationArray as $recommendationFlandersId) {
                    $recommendationCollection->add($this->finderGenerator->findRecommendationOrGenerateIt($recommendationFlandersId));
                }
                $paragraph->setRecommendations($recommendationCollection);

                $componentCollection = new ArrayCollection();
                $componentArray = $paragraph->getComponentsXML();
                foreach ($componentArray as $componentFlandersId) {
                    $componentCollection->add($this->finderGenerator->findComponentOrGenerateIt($componentFlandersId));
                }
                $paragraph->setComponents($componentCollection);

                $workproductCollection = new ArrayCollection();
                $workproductArray = $paragraph->getWorkProductsXML();
                foreach ($workproductArray as $workproductTag) {
                    $workproductCollection->add($this->finderGenerator->findWorkproductOrGenerateIt($workproductTag));
                }
                $paragraph->setWorkProducts($workproductCollection);

                $testlabCollection = new ArrayCollection();
                $testlabArray = $paragraph->getTestLabsXML();
                foreach ($testlabArray as $testlabFlandersId) {
                    $testlabCollection->add($this->finderGenerator->findTestlabOrGenerateIt($testlabFlandersId));
                }
                $paragraph->setTestLabs($testlabCollection);

                $inputCollection = new ArrayCollection();
                $inputArray = $paragraph->getInputsXML();
                foreach ($inputArray as $stepRequirement) {
                    $inputCollection->add($this->finderGenerator->findWorkproductOrGenerateIt($stepRequirement));
                }
                $paragraph->setInputs($inputCollection);

                $requirementCollection = new ArrayCollection();
                $requirementArray = $paragraph->getRequirementsXML();
                /** @var Step\Requirement $stepRequirement */
                foreach ($requirementArray as $stepRequirement) {
                    $requirement = $this->finderGenerator->findRequirementOrGenerateIt($stepRequirement->getTag(), $stepRequirement->getChapterNumber(), $stepRequirement->getClauseNumber(), $stepRequirement->getPart());
                    $requirementCollection->add($requirement);
                }
                $paragraph->setRequirements($requirementCollection);

                if (null !== $paragraph->getRaci()) {
                    $raci = $paragraph->getRaci();
                    $raci->setParagraph($paragraph);
                    $this->deserializeRaci($raci);
                }

                /** @var Step\LinkFlow $linkFlow */
                foreach ($paragraph->getLinkFlowSteps() as $linkFlow) {
                    $this->finderGenerator->findLinkFlowOrPersistIt($linkFlow);
                }

                /** @var Step\Image $image */
                foreach ($paragraph->getImages() as $image) {
                    $this->finderGenerator->findImageOrPersistIt($image);
                }
            }
        }

        $this->persistEntity($step);
        return $step;
    }

    /**
     * @param Raci $raci
     */
    public function deserializeRaci($raci)
    {
        $personResponsibleCollection = new ArrayCollection();
        $personResponsibleArray = $raci->getPeopleResponsibleXML();
        foreach ($personResponsibleArray as $personResponsible) {
            $personResponsibleCollection->add($this->finderGenerator->findRoleOrGenerateIt($personResponsible));
        }
        $raci->setPeopleResponsible($personResponsibleCollection);


        $personConsultedCollection = new ArrayCollection();
        $personConsultedArray = $raci->getPeopleConsultedXML();
        foreach ($personConsultedArray as $personConsulted) {
            $personConsultedCollection->add($this->finderGenerator->findRoleOrGenerateIt($personConsulted));
        }
        $raci->setPeopleConsulted($personConsultedCollection);


        $personInformedCollection = new ArrayCollection();
        $personInformedArray = $raci->getPeopleInformedXML();
        foreach ($personInformedArray as $personInformed) {
            $personInformedCollection->add($this->finderGenerator->findRoleOrGenerateIt($personInformed));
        }
        $raci->setPeopleInformed($personInformedCollection);


        $personAccountableCollection = new ArrayCollection();
        $personAccountableArray = $raci->getPeopleAccountableXML();
        foreach ($personAccountableArray as $personAccountable) {
            $personAccountableCollection->add($this->finderGenerator->findRoleOrGenerateIt($personAccountable));
        }
        $raci->setPeopleAccountable($personAccountableCollection);
    }
} 