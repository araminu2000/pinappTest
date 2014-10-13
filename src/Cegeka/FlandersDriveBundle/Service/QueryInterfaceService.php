<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Session\Session;

class QueryInterfaceService
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var FilteringService
     */
    protected $filteringService;

    /**
     * @var array
     */
    protected $filterColumns = [
        'scalingTag'  => 'Standards',
        'oblig' => 'Obligation',
        'type'  => 'Requirement Type',
        'subType' => 'Sub Type',
        'testType' => 'Test Type',
        'clauseType' => 'Clause Type',
    ];



    public function __construct(ObjectManager $manager, Session $session, FilteringService $filteringService)
    {
        $this->manager = $manager;
        $this->session = $session;
        $this->filteringService = $filteringService;
    }

    /**
     * @return array
     */
    public function getFilterColumns()
    {
        return $this->filterColumns;
    }

    public function getUniqueScalingTags(array $filter=array())
    {
        $query = $this->manager->createQueryBuilder()
                    ->select('st.value as value')
                    ->from('CegekaFlandersDriveBundle:Requirement' , 'r')
                    ->join('r.scalingTag', 'st')
                    ->groupBy('st.value');

        unset($filter['scalingTag']);

        foreach ($filter as $filterColumn=>$value) {
            if (!empty($value)) {
                $query->andWhere("r.{$filterColumn}=:{$filterColumn}Value")
                    ->setParameter("{$filterColumn}Value", $value);
            }
        }

        $result = $query->getQuery()
            ->getArrayResult();

        return $result;
    }

    public function getUniqueRequirementColumnByFilter($column, array $filter=array())
    {
        /**
         * @var \Doctrine\ORM\QueryBuilder $query
         */
        $query = $this->manager->createQueryBuilder()->select("r.{$column} as value")
            ->from('CegekaFlandersDriveBundle:Requirement' , 'r')
            ->where("r.{$column} IS NOT NULL")
            ->groupBy("r.{$column}");

        if (array_key_exists('scalingTag', $filter) && !empty($filter['scalingTag'])) {
            $query->join('r.scalingTag', 'st')
                ->andWhere("st.value=:stValue")
                ->setParameter("stValue", $filter['scalingTag']);;
            unset($filter['scalingTag']);
        }

        foreach ($filter as $filterColumn=>$value) {
            if (!empty($value) && $column != $filterColumn) {
                $query->andWhere("r.{$filterColumn}=:{$filterColumn}Value")
                        ->setParameter("{$filterColumn}Value", $value);
            }
        }

        $result = $query->getQuery()
            ->getArrayResult();

        return $result;
    }

    public function getUniqueRequiremntColumnsByFilter(array $filter=array())
    {
        $filterColumns = array_keys($this->filterColumns);
        $result=[];
        $result['scalingTag'] = $this->getUniqueScalingTags($filter);

        foreach ($filterColumns as $column) {
            if ($column != 'scalingTag') {
                $result[$column] = $this->getUniqueRequirementColumnByFilter($column, $filter);
            }
        }

        return $result;
    }

    public function getRequirementsByFilters(array $filter=array())
    {
        /**
         * @var \Doctrine\ORM\QueryBuilder $query
         */
        $query = $this->manager->createQueryBuilder()->select("r")
            ->from('CegekaFlandersDriveBundle:Requirement' , 'r')
            ->join('r.scalingTag', 'st')
            ->where("1=1")
            ->groupBy("r.id");

        if (array_key_exists('scalingTag', $filter) && !empty($filter['scalingTag'])) {
            $query->andWhere("st.value=:stValue")
                ->setParameter("stValue",$filter['scalingTag']);
            unset($filter['scalingTag']);
        }

        foreach ($filter as $filterColumn=>$value) {
            if (!empty($value)) {
                if ($filterColumn == 'type') {
                    $query->andWhere("r.{$filterColumn} LIKE :{$filterColumn}Value")
                        ->setParameter("{$filterColumn}Value", "%{$value}%");
                } else {
                    $query->andWhere("r.{$filterColumn}=:{$filterColumn}Value")
                        ->setParameter("{$filterColumn}Value", $value);
                }
            }
        }

        $requirements = $query->getQuery()->getResult();
        $requirements = $this->filteringService->filterRequirementsArray($requirements);

        return $requirements;
    }
}