<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Application\Sonata\UserBundle\Entity\User;
use Cegeka\FlandersDriveBundle\Entity\Company;
use Cegeka\FlandersDriveBundle\Entity\Component;
use Cegeka\FlandersDriveBundle\Entity\Glossary\GlossaryStandard;
use Cegeka\FlandersDriveBundle\Entity\Material;
use Cegeka\FlandersDriveBundle\Entity\Flow;
use Cegeka\FlandersDriveBundle\Entity\Recommendation;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Cegeka\FlandersDriveBundle\Entity\Role;
use Cegeka\FlandersDriveBundle\Entity\Step\LinkFlow;
use Cegeka\FlandersDriveBundle\Entity\UserScalingParameters;
use Cegeka\FlandersDriveBundle\Entity\Workproduct;
use Cegeka\FlandersDriveBundle\Entity\Testlab;
use Cegeka\FlandersDriveBundle\Entity\SymbolAbbreviation\SymbolAbbreviationStandard;
use Doctrine\Common\Persistence\ObjectManager;

class FinderGenerator
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function findUserScalingParametersOrGenerateIt(User $user)
    {
        $entity = $this->manager->getRepository('CegekaFlandersDriveBundle:UserScalingParameters')->findOneBy([
            'user' => $user,
        ]);

        if (null === $entity) {
            $entity = new UserScalingParameters();
            $entity->setUser($user);

            $this->manager->persist($entity);
            $this->manager->flush();
        }

        return $entity;
    }

    /**
     * Find a requirement or generate it if it already exists based on the combination of the parameter tags.
     * @param $tag
     * @param $chapterNumber
     * @param $clauseNumber
     * @param $part
     * @return Requirement
     */
    public function findRequirementOrGenerateIt($tag, $chapterNumber, $clauseNumber, $part)
    {
        $entity = $this->manager->getRepository('CegekaFlandersDriveBundle:Requirement')->findOneBy(
            [
                'tag' => $tag,
                'chapterNumber' => $chapterNumber,
                'clauseNumber' => $clauseNumber,
                'part' => $part
            ]
        );

        if (null === $entity) {
            $entity = new Requirement();
            $entity
                ->setTag($tag)
                ->setChapterNumber($chapterNumber)
                ->setClauseNumber($clauseNumber)
                ->setPart($part);

            $this->manager->persist($entity);
            $this->manager->flush();
        }

        return $entity;
    }

    public function findCompanyOrGenerateIt($flandersId)
    {
        if (null === $flandersId) {
            return null;
        }

        $referencedCompany = $this->manager->getRepository('CegekaFlandersDriveBundle:Company')->findOneBy(['flandersId' => $flandersId]);

        if (null === $referencedCompany) {
            $referencedCompany = new Company();
            $referencedCompany->setFlandersId($flandersId);

            $this->manager->persist($referencedCompany);
            $this->manager->flush();
        }

        return $referencedCompany;
    }

    public function findSymbolAbbreviationValueOrGenerateIt($term, $type, $description, $unit)
    {
        $symAbbrStandard = $this->manager->getRepository('CegekaFlandersDriveBundle:SymbolAbbreviation\SymbolAbbreviationStandard')->findOneBy([
            'term' => $term,
            'type' => $type,
            'description' => $description,
            'unit' => $unit
        ]);

        if (null === $symAbbrStandard) {
            $symAbbrStandard = new SymbolAbbreviationStandard();
            $symAbbrStandard
                ->setType($type)
                ->setTerm($term)
                ->setDescription($description)
                ->setUnit($unit);

            $this->manager->persist($symAbbrStandard);
            $this->manager->flush();
        }

        return $symAbbrStandard;
    }

    public function findGlossaryValueOrGenerateIt($term, $src, $description, $explanation)
    {
        $glossary = $this->manager->getRepository('CegekaFlandersDriveBundle:Glossary\GlossaryStandard')->findOneBy([
            'term' => $term,
            'src' => $src,
            'description' => $description,
            'explanation' => $explanation
        ]);

        if (null === $glossary) {
            $glossary = new GlossaryStandard();
            $glossary->setSrc($src)
                ->setTerm($term)
                ->setDescription($description)
                ->setExplanation($explanation);

            $this->manager->persist($glossary);
            $this->manager->flush();
        }

        return $glossary;
    }

    public function findFlowOrGenerateIt($flandersId)
    {
        if (null === $flandersId) {
            return null;
        }

        $flow = $this->manager->getRepository('CegekaFlandersDriveBundle:Flow')->findOneBy(['flandersId' => $flandersId]);

        if (null === $flow) {
            $flow = new Flow();
            $flow->setFlandersId($flandersId);

            $this->manager->persist($flow);
            $this->manager->flush();
        }

        return $flow;
    }

    public function findMaterialOrGenerateIt($flandersId)
    {
        if (null === $flandersId) {
            return null;
        }

        $material = $this->manager->getRepository('CegekaFlandersDriveBundle:Material')->findOneBy(['flandersId' => $flandersId]);

        if (null === $material) {
            $material = new Material();
            $material->setFlandersId($flandersId);

            $this->manager->persist($material);
            $this->manager->flush();
        }

        return $material;
    }

    public function findRecommendationOrGenerateIt($flandersId)
    {
        if (null === $flandersId) {
            return null;
        }

        $recommendation = $this->manager->getRepository('CegekaFlandersDriveBundle:Recommendation')->findOneBy(['flandersId' => $flandersId]);

        if (null === $recommendation) {
            $recommendation = new Recommendation();
            $recommendation->setFlandersId($flandersId);

            $this->manager->persist($recommendation);
            $this->manager->flush();
        }

        return $recommendation;
    }

    public function findComponentOrGenerateIt($flandersId)
    {
        if (null === $flandersId) {
            return null;
        }

        $component = $this->manager->getRepository('CegekaFlandersDriveBundle:Component')->findOneBy(['flandersId' => $flandersId]);

        if (null === $component) {
            $component = new Component();
            $component->setFlandersId($flandersId);

            $this->manager->persist($component);
            $this->manager->flush();
        }

        return $component;
    }

    public function findWorkproductOrGenerateIt($tag)
    {
        if (null === $tag) {
            return null;
        }

        $workproduct = $this->manager->getRepository('CegekaFlandersDriveBundle:Workproduct')->findOneBy(['tag' => $tag]);

        if (null === $workproduct) {
            $workproduct = new Workproduct();
            $workproduct->setTag($tag);

            $this->manager->persist($workproduct);
            $this->manager->flush();
        }

        return $workproduct;
    }

    public function findTestlabOrGenerateIt($flandersId)
    {
        if (null === $flandersId) {
            return null;
        }

        $testlab = $this->manager->getRepository('CegekaFlandersDriveBundle:Testlab')->findOneBy(['flandersId' => $flandersId]);

        if (null === $testlab) {
            $testlab = new Testlab();
            $testlab->setFlandersId($flandersId);

            $this->manager->persist($testlab);
            $this->manager->flush();
        }

        return $testlab;
    }

    public function findLinkFlowOrPersistIt($linkFlow)
    {
        if (null === $linkFlow) {
            return null;
        }

        $link = $this->manager->getRepository('CegekaFlandersDriveBundle:Step\LinkFlow')->findOneBy(['href' => $linkFlow->getHref()]);

        if (null === $link) {
            $this->manager->persist($linkFlow);
            $this->manager->flush();
        }

        return $link;
    }

    public function findImageOrPersistIt($image)
    {
        if (null === $image) {
            return null;
        }

        $link = $this->manager->getRepository('CegekaFlandersDriveBundle:Step\Image')->findOneBy(['src' => $image->getSrc()]);

        if (null === $link) {
            $this->manager->persist($image);
            $this->manager->flush();
        }

        return $link;
    }

    public function findRoleOrGenerateIt($person)
    {
        if (null === $person) {
            return null;
        }

        $role = $this->manager->getRepository('CegekaFlandersDriveBundle:Role')->findOneBy(['person' => $person]);

        if (null === $role) {
            $role = new Role();
            $role->setPerson($person);

            $this->manager->persist($role);
            $this->manager->flush();
        }

        return $role;
    }

}