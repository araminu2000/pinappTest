<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use FS\SolrBundle\Doctrine\Hydration\HydrationModes;
use FS\SolrBundle\Solr;
use Symfony\Component\HttpFoundation\Session\Session;

class SolrService
{

    /**
     * @var Solr
     */
    protected $solr;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var ObjectManager
     */
    protected $entityManager;

    /**
     * @var ScalingParametersService
     */
    protected $scalingParametersService;

    public function __construct(Solr $solr, Session $session, ObjectManager $entityManager, ScalingParametersService $scalingParametersService)
    {
        $this->solr = $solr;
        $this->session = $session;
        $this->entityManager = $entityManager;
        $this->scalingParametersService = $scalingParametersService;
    }

    public function searchInAllEntities($searchTerm)
    {
        $result['testLabs'] = $this->validateArray($this->querySearchTermInRepository('CegekaFlandersDriveBundle:Testlab', $searchTerm, 'testlab'));
        $result['components'] = $this->validateArray($this->querySearchTermInRepository('CegekaFlandersDriveBundle:Component', $searchTerm, 'component'));
        $result['requirements'] = $this->validateArray($this->querySearchTermInRepository('CegekaFlandersDriveBundle:Requirement', $searchTerm, 'requirement'));
        $result['materials'] = $this->validateArray($this->querySearchTermInRepository('CegekaFlandersDriveBundle:Material', $searchTerm, 'material'));
        $result['recommendations'] = $this->validateArray($this->querySearchTermInRepository('CegekaFlandersDriveBundle:Recommendation', $searchTerm, 'recommendation'));
        $result['flows'] = $this->validateArray($this->querySearchTermInRepository('CegekaFlandersDriveBundle:Flow', $searchTerm, 'flow'));
        $result['steps'] = $this->validateArray($this->querySearchTermInRepository('CegekaFlandersDriveBundle:Step', $searchTerm, 'step'));

        return $result;
    }

    /**
     * Query a repository with a search term across all fields.
     * @param string $repository The name of the repository to be searched.
     * @param string $searchTerm The search term.
     * @param $documentaName
     * @return array
     */
    public function querySearchTermInRepository($repository, $searchTerm, $documentaName)
    {
        $query = $this->solr->createQuery($repository);

        $query->queryAllFields($searchTerm);

        $query->setUseAndOperator(false);
        $query->setHydrationMode(HydrationModes::HYDRATE_DOCTRINE);

        $searchTerms = $query->getSearchTerms();
        unset($searchTerms['id']);
        unset($searchTerms['id_i']);
        unset($searchTerms['flanders_id_s']);
        $query->setSearchTerms($searchTerms);

        $query = $query->setRows(5000);

        $queryScalingParameters = '';
        $entityName = $this->entityManager->getRepository($repository)->getClassName();
        $entity = new $entityName();
        $uniqueScalingParameters = $this->scalingParametersService->findAllUniqueScalingParameters();

        if (method_exists($entity, 'getSearchBySolrFields')) {
            $solrFields = $entity->getSearchBySolrFields();
            $scalingParameters = (array)$this->session->get('scalingParameters');

            foreach($uniqueScalingParameters as $uniqueScalingParameterKey=>$uniqueScalingParameterValues) {
                if (!array_key_exists($uniqueScalingParameterKey, $scalingParameters)) {
                    $scalingParameters[$uniqueScalingParameterKey] = $uniqueScalingParameterValues;
                }
            }

            if(!empty($scalingParameters)) {
                foreach ($scalingParameters as $key=>$scalingParametersValues) {
                    if (array_key_exists($key, $solrFields)) {
                        $queryScalingParameter = '';
                        foreach ($scalingParametersValues as $scalingParametersValue) {
                            $queryScalingParameter .= !empty($queryScalingParameter) ? ' OR ':'';
                            $scalingParametersValue = str_replace(' ', '\\ ', $scalingParametersValue);
                            $scalingParametersValue = str_replace(':', '\\:', $scalingParametersValue);
                            $queryScalingParameter .= "{$solrFields[$key]}_s:*{$scalingParametersValue}*";
                        }

                        if (!empty($queryScalingParameter)) {
                            if (!empty($queryScalingParameters)) {
                                $queryScalingParameters .= ' AND ';
                            }
                            $queryScalingParameters .= "({$queryScalingParameter})";
                        }
                    }
                }
            }

            $queryScalingParameters = !empty($queryScalingParameters) ? " AND ({$queryScalingParameters}) " : "";
        }

        $queryString = $query->getQuery();
        $queryString = "document_name_s:*{$documentaName}* {$queryScalingParameters} AND ({$queryString})";

        $query->setCustomQuery($queryString);

        return $query->getResult();
    }

    protected function validateArray($array)
    {
        foreach ($array as $key => $element) {
            if (null === $element->getSolrId() || null === $element->getId()) {
                unset($array[$key]);
            }
        }

        return $array;
    }
} 