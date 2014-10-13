<?php


namespace Cegeka\FlandersDriveBundle\Service\Hydrator;


use Cegeka\FlandersDriveBundle\Entity\Glossary;
use Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryCollection;

class GlossaryHydrator extends HydratorBase
{
    /**
     * @inheritdoc
     */
    public function serialize($glossaryArray)
    {
        $glossary = new Glossary();
        $glossary->setElements($glossaryArray);

        return $this->serializer->serialize($glossary, 'xml');
    }

    /**
     * @inheritdoc
     * @return Glossary
     */
    public function deserialize($xmlString)
    {
        $collection = $this->serializer->deserialize($xmlString, 'Cegeka\FlandersDriveBundle\Entity\Glossary', 'xml');

        /** @var Glossary\GlossaryTerm $term */
        foreach ($collection as $term) {
            $element = $term->getLiSafe();
            $term->setLiSafe($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));

            $element = $term->getIec626601();
            if (null !== $element) {
                $term->setIec626601($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIec626602();
            if (null !== $element) {
                $term->setIec626602($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIec62133();
            if (null !== $element) {
                $term->setIec62133($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIec60050482();
            if (null !== $element) {
                $term->setIec60050482($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIec60068264();
            if (null !== $element) {
                $term->setIec60068264($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIec62281();
            if (null !== $element) {
                $term->setIec62281($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIec61851();
            if (null !== $element) {
                $term->setIec61851($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIso124051();
            if (null !== $element) {
                $term->setIso124051($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIso124052();
            if (null !== $element) {
                $term->setIso124052($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIso1675012006();
            if (null !== $element) {
                $term->setIso1675012006($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIsoIecPas16898();
            if (null !== $element) {
                $term->setIsoIecPas16898($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIso646912009();
            if (null !== $element) {
                $term->setIso646912009($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIso646922009();
            if (null !== $element) {
                $term->setIso646922009($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIsoDis6469();
            if (null !== $element) {
                $term->setIsoDis6469($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIsoIec17000();
            if (null !== $element) {
                $term->setIsoIec17000($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSaej1797();
            if (null !== $element) {
                $term->setSaej1797($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSaej2380();
            if (null !== $element) {
                $term->setSaej2380($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSaej2464();
            if (null !== $element) {
                $term->setSaej2464($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSaej1798();
            if (null !== $element) {
                $term->getSaej1798($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSaej2289();
            if (null !== $element) {
                $term->setSaej2289($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSaej2929();
            if (null !== $element) {
                $term->setSaej2929($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSaej2344();
            if (null !== $element) {
                $term->setSaej2344($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getUn383();
            if (null !== $element) {
                $term->setUn383($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getRegNr100();
            if (null !== $element) {
                $term->setRegNr100($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIeee1625();
            if (null !== $element) {
                $term->setIeee1625($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIeee1725();
            if (null !== $element) {
                $term->setIeee1725($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getUl1642();
            if (null !== $element) {
                $term->setUl1642($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getUl2054();
            if (null !== $element) {
                $term->setUl2054($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getUl2580();
            if (null !== $element) {
                $term->setUl2580($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getUsDepTransp();
            if (null !== $element) {
                $term->setUsDepTransp($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getNenEn15194();
            if (null !== $element) {
                $term->setNenEn15194($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getBatso01();
            if (null !== $element) {
                $term->setBatso01($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getJisC8714();
            if (null !== $element) {
                $term->setJisC8714($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getAnsiC181();
            if (null !== $element) {
                $term->setAnsiC181($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getAnsiC182();
            if (null !== $element) {
                $term->setAnsiC182($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getIneris();
            if (null !== $element) {
                $term->setIneris($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getUsabcEnergystorageabusetest();
            if (null !== $element) {
                $term->setUsabcEnergystorageabusetest($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getUsabcFreedomcar();
            if (null !== $element) {
                $term->setUsabcFreedomcar($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $element = $term->getSand990497();
            if (null !== $element) {
                $term->setSand990497($this->finderGenerator->findGlossaryValueOrGenerateIt($element->getTerm(), $element->getSrc(), $element->getDescription(), $element->getExplanation()));
            }

            $this->manager->persist($term);
        }

        $this->manager->flush();
    }
} 