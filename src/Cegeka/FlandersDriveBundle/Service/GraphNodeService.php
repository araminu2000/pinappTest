<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Cegeka\FlandersDriveBundle\Entity\FileStructure\Substructure;

class GraphNodeService
{
    /** @var FilteringService */
    protected $filteringService;

    protected $graphNodes;

    protected $innerCircleNodes = array(
        '0804', '0809', '0810', '0900a', '0900b', '1000b', '0900d', '1000d'
    );

    protected $unwantedLinksInMainFlow = array(
        '0900'      => '1000a',
        '0900a'     => '1000c',
        '0900b'     => '1000e',
        '1000d'     => '0900b'
    );


    public function __construct(FilteringService $filteringService)
    {
        $this->filteringService = $filteringService;
        $this->reset();
    }

    /**
     * @param $substructures
     * @param bool $limitToMainFlow
     * @return array
     */
    public function extractGraphNodes($substructures, $limitToMainFlow)
    {
        $this->reset();

        foreach( $substructures as $substructure ) {
            /** @var Substructure $substructure */

            $flandersId = $substructure->getReferencedProcess()->getFlandersId();
            if( array_key_exists($flandersId, $this->graphNodes) ) {
                if( $this->graphNodes[ $flandersId ]->main_flow == false ) {
                    $this->graphNodes[ $flandersId ]->main_flow = $substructure->getMainFlow() == 'yes' ? true : false;
                }
            } else {
                $this->graphNodes[ $flandersId ] = $this->extractNode($substructure);
            }
        }

        $this->addLinks($substructures, $limitToMainFlow);

        return $this->graphNodes;
    }

    /**
     * @param $substructures
     * @param bool $limitToMainFlow
     */
    protected function addLinks($substructures, $limitToMainFlow)
    {
        foreach ($substructures as $substructure) {
            /** @var Substructure $substructure */

            if ($substructure->getAfterReference()) {
                $this->addLink($substructure->getAfterReference()->getFlandersId(), $substructure->getReferencedProcess()->getFlandersId(), 'after', $limitToMainFlow);
            }

            if ($substructure->getAfterYesReference()) {
                $this->addLink($substructure->getAfterYesReference()->getFlandersId(), $substructure->getReferencedProcess()->getFlandersId(), 'after_yes', $limitToMainFlow);
            }

            if ($substructure->getAfterNoReference()) {
                $this->addLink($substructure->getAfterNoReference()->getFlandersId(), $substructure->getReferencedProcess()->getFlandersId(), 'after_no', $limitToMainFlow);
            }
        }
    }

    protected function isLinkAllowed($source, $target, $limitToMainFlow)
    {
        if( $limitToMainFlow && array_key_exists( $source, $this->unwantedLinksInMainFlow ) && $this->unwantedLinksInMainFlow[ $source ] == $target ) {
            return false;
        }

        return true;
    }

    /**
     * @param string $source
     * @param string $target
     * @param string $type
     * @param bool $limitToMainFlow
     */
    protected function addLink($source, $target, $type, $limitToMainFlow)
    {
        if( !$this->isLinkAllowed( $source, $target, $limitToMainFlow ) ) {
            return;
        }

        foreach( $this->graphNodes[$source]->links as $link ) {
            if( $link->flanders_id == $target ) {
                return;
            }
        }

        $link = new \StdClass();
        $link->flanders_id = $target;
        $link->type = $type;

        $this->graphNodes[$source]->links[] = $link;
    }

    protected function reset()
    {
        $this->graphNodes = array();
    }

    /**
     * @param Substructure $substructure
     * @return \StdClass
     */
    protected function extractNode($substructure)
    {
        $graphNode = new \StdClass();
        $graphNode->disabled = false;

        if (!$this->filteringService->filterSubstructureScaledTo($substructure)) {
            $graphNode->disabled = true;
        } else {
            if( 'step' === $substructure->getType() && !is_null($substructure->getReferencedProcess()->getStep()) ) {
                $graphNode->disabled = !$this->filteringService->filterStep($substructure->getReferencedProcess()->getStep());
            } elseif( 'decision' === $substructure->getType() && !is_null($substructure->getReferencedProcess()->getDecision()) ) {
                $graphNode->disabled = !$this->filteringService->filterDecision($substructure->getReferencedProcess()->getDecision());
                $graphNode->childrenDrawn = false;
            } elseif( 'flow' === $substructure->getType() && !is_null($substructure->getReferencedProcess()) ) {
                $graphNode->disabled = !$this->filteringService->filterFlow($substructure->getReferencedProcess());
            }
        }

        $graphNode->flanders_id = $substructure->getReferencedProcess()->getFlandersId();
        $graphNode->name = $substructure->getDisplayName();
        $graphNode->main_graph = $substructure->getMainGraph() == 'yes' ? true : false;
        $graphNode->main_flow = $substructure->getMainFlow() == 'yes' ? true : false;
        $graphNode->reference = new \StdClass();
        $graphNode->reference->type = $substructure->getType();
        $graphNode->reference->id = $substructure->getReferenceObject() != null ? $substructure->getReferenceObject()->getId() : 0;
        $graphNode->group = new \StdClass();
        $graphNode->group->id = $substructure->getGroup()->getId();
        $graphNode->group->name = $substructure->getGroup()->getName();
        $graphNode->links = array();
        $graphNode->index = 0;
        $graphNode->expectedIndex = 0;
        $graphNode->elementYOffset = 0;
        $graphNode->direction = 1;

        if( in_array( $graphNode->flanders_id, $this->innerCircleNodes ) ) {
            $graphNode->direction = -1;
        }

        return $graphNode;
    }

}