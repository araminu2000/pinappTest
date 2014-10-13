<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Cegeka\FlandersDriveBundle\Entity\FileStructure\Group;
use Cegeka\FlandersDriveBundle\Entity\Flow;
use Doctrine\Common\Persistence\ObjectManager;

class GraphService
{
    /** @var ObjectManager */
    protected $manager;

    /** @var FilteringService */
    protected $filteringService;

    /** @var GraphNodeService */
    protected $graphNodeService;

    /** @var PathService */
    protected $pathService;

    /** @var array */
    protected $columns;

    /** @var array */
    protected $floatingNodes;


    public function __construct(ObjectManager $manager, FilteringService $filteringService)
    {
        $this->manager = $manager;
        $this->filteringService = $filteringService;

        $this->pathService = new PathService();
        $this->graphNodeService = new GraphNodeService($filteringService);

        $this->reset();
    }


    public function getTopLevelGraphItems()
    {
        $flows = $this->manager->getRepository('CegekaFlandersDriveBundle:FileStructure\Substructure')->findAll();

        return $this->createGraphInput(
            $flows, '0100', '0808', true
        );
    }

    public function getFlowLevelGraphItems($flandersId)
    {
        /** @var Flow $flow */
        $flow = $this->manager->getRepository('CegekaFlandersDriveBundle:Flow')->findOneBy(['flandersId' => $flandersId]);

        $fileStructure = $flow->getFileStructure();
        $groups = $fileStructure->getGroups();
        /** @var Group $firstGroup */
        $firstGroup = $groups[0];
        $substructures = $firstGroup->getSubstructures();

        $startNodeFlandersId = $substructures->first()->getReferencedProcess()->getFlandersId();
        $endNodeFlandersId = $substructures->last()->getReferencedProcess()->getFlandersId();

        return $this->createGraphInput(
            $substructures, $startNodeFlandersId, $endNodeFlandersId
        );
    }

    /**
     * @param $substructures
     * @param string $start
     * @param string $end
     * @param bool $limitToMainFlow
     * @return array
     */
    public function createGraphInput($substructures, $start = '0100', $end = '0808', $limitToMainFlow = false)
    {
        $this->reset();

        $graphNodes = $this->graphNodeService->extractGraphNodes($substructures, $limitToMainFlow);
        $longestPath = $this->pathService->getLongestPath($graphNodes, $start, $end, $limitToMainFlow);

        // Add main flow nodes to result set
        $firstColumn = array();
        for ($i = 0; $i < count($longestPath); ++$i) {
            $nodeId = $longestPath[$i];
            $node = $graphNodes[$nodeId];
            $node->lineToNextElement = $i != (count($longestPath) - 1) ? true : false;
            $node->index = $i;
            $node->expectedIndex = $i;

            $firstColumn[] = $graphNodes[$nodeId];
        }

        $this->columns[] = $firstColumn;
        $missingNodes = array_diff(array_keys($graphNodes), $longestPath);

        // Add additional nodes to main graph
        $this->addLinkedNodesToGraph($limitToMainFlow, $missingNodes, $graphNodes);

        // Calculate elementYOffset value for subflow graph
        $this->addVerticalOffsetValuesForSubflows();

        // Calculate indexes for floating nodes (only for main flow)
        $this->calculateIndexesForFloatingNodes();

        $this->improvePositions(
            [
                '0804' => [-1, -1],
                '0807' => [-1, -1],
                '1100b' => [1, -1],
            ]
        );

        $this->improveOffsets(
            [
                '1105' => [-1, 0],
                '1110' => [-2, 0],
            ]
        );

        return $this->columns;
    }

    static function sortArrayIndexes($a, $b)
    {
        if ($a->expectedIndex == $b->expectedIndex) {
            return 0;
        }

        return ($a->expectedIndex < $b->expectedIndex) ? -1 : 1;
    }

    /**
     * @param \StdClass $node
     * @return int
     */
    protected function getColumn($node)
    {
        $foundStep = null;
        $foundColumn = -1;

        // Search for references in links for node
        foreach ($node->links as $link) {
            for ($i = 0; $i < count($this->columns); ++$i) {
                for ($j = 0; $j < count($this->columns[$i]); ++$j) {
                    $step = $this->columns[$i][$j];
                    if (($step->flanders_id == $link->flanders_id) && $this->isCloserToNode($node, $step, $foundStep)) {
                        if ($i == 0) {
                            $node->elementYOffset = $j;
                        } else {
                            $node->elementYOffset = $step->elementYOffset;
                        }

                        $node->expectedIndex = $step->expectedIndex;
                        $foundStep = $step;
                        $foundColumn = $i + 1;
                    }
                }
            }
        }

        // Search for references in other nodes that link to this one
        for ($i = 0; $i < count($this->columns); ++$i) {
            for ($j = 0; $j < count($this->columns[$i]); ++$j) {
                $step = $this->columns[$i][$j];
                if ($this->stepLinksToNode($step, $node) && $this->isCloserToNode($node, $step, $foundStep)) {
                    if ($i == 0) {
                        $node->elementYOffset = $j;
                    } else {
                        $node->elementYOffset = $step->elementYOffset;
                    }

                    $node->expectedIndex = $step->expectedIndex;
                    $foundStep = $step;
                    $foundColumn = $i + 1;
                }
            }
        }

        // Check if there is already another node in the position we found
        for ($i = 0; $foundColumn > 0 && array_key_exists($foundColumn, $this->columns) && $i < count($this->columns[$foundColumn]); ++$i) {
            if ($node->expectedIndex == $this->columns[$foundColumn][$i]->expectedIndex && $node->direction == $this->columns[$foundColumn][$i]->direction) {
                ++$foundColumn;
                $i = -1;
            }

            if (!array_key_exists($foundColumn, $this->columns)) {
                $this->columns[$foundColumn] = array();
            }
        }

        return $foundColumn;
    }

    /**
     * @param \StdClass $step
     * @param \StdClass $node
     * @return bool
     */
    protected function stepLinksToNode($step, $node)
    {
        foreach ($step->links as $link) {
            if ($link->flanders_id == $node->flanders_id) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \StdClass $node
     * @param \StdClass $newStep
     * @param \StdClass $currentClosestStep
     * @return bool
     */
    protected function isCloserToNode($node, $newStep, $currentClosestStep)
    {
        if ($currentClosestStep == null || ($node->group->id == $newStep->group->id && $node->group->id != $currentClosestStep->group->id)) {
            return true;
        }

        $currentDistance = $this->calculateDistance($node, $currentClosestStep);
        $newDistance = $this->calculateDistance($node, $newStep);

        return ($newDistance < $currentDistance);
    }

    /**
     * @param \StdClass $node
     * @param \StdClass $step
     * @return bool
     */
    public function calculateDistance($node, $step)
    {
        return abs($this->getNodeValue($node) - $this->getNodeValue($step));
    }

    /**
     * @param \StdClass $node
     * @return int
     */
    protected function getNodeValue($node)
    {
        preg_match_all('!\d+!', $node->flanders_id, $matches);

        return $matches[0][0];
    }

    protected function reset()
    {
        $this->columns = array();
        $this->floatingNodes = array();
    }

    /**
     * @param $limitToMainFlow
     * @param $missingNodes
     * @param $graphNodes
     */
    protected function addLinkedNodesToGraph($limitToMainFlow, $missingNodes, $graphNodes)
    {
        foreach ($missingNodes as $nodeId) {
            $node = $graphNodes[$nodeId];
            if ($limitToMainFlow && !$node->main_graph) {
                continue;
            }

            $column = $this->getColumn($node);
            if ($column < 0) {
                if ($limitToMainFlow) {
                    $this->floatingNodes[] = $node;
                }

                continue;
            }

            if (!array_key_exists($column, $this->columns)) {
                $this->columns[$column] = array();
            }

            $node->index = count($this->columns[$column]);
            $this->columns[$column][] = $node;
        }
    }

    protected function calculateIndexesForFloatingNodes()
    {
        for ($i = 0; $i < count($this->floatingNodes); ++$i) {
            $node = $this->floatingNodes[$i];
            $foundColumn = 1;

            for ($j = 0; $node->expectedIndex == 0 && $j < count($this->columns[0]); ++$j) {

                if ($node->group->id == $this->columns[0][$j]->group->id) {
                    $node->expectedIndex = $this->columns[0][$j]->expectedIndex;

                    for ($k = 0; array_key_exists($foundColumn, $this->columns) && $k < count($this->columns[$foundColumn]); ++$k) {
                        if ($node->expectedIndex == $this->columns[$foundColumn][$i]->expectedIndex) {
                            ++$foundColumn;
                            $i = -1;
                        }

                        if (!array_key_exists($foundColumn, $this->columns)) {
                            $this->columns[$foundColumn] = array();
                        }
                    }
                }

            }

            $this->columns[$foundColumn][] = $node;
        }
    }

    protected function addVerticalOffsetValuesForSubflows()
    {
        for ($i = 1; $i < count($this->columns); ++$i) {
            $maxIndex = 0;
            $totalOffsetSoFar = 1;

            foreach ($this->columns[$i] as $node) {
                $elementYOffset = $node->elementYOffset;
                $totalOffsetSoFar = $totalOffsetSoFar + $elementYOffset - $maxIndex - 1;

                $node->elementYOffset = $totalOffsetSoFar;
                $node->lineToNextElement = false;
                $maxIndex = $totalOffsetSoFar;
            }
        }
    }

    protected function improvePositions($improvements)
    {
        for ($i = 1; $i < count($this->columns); $i++) {

            for ($j = 0; $j < count($this->columns[$i]); $j++) {

                $node = $this->columns[$i][$j];
                if (array_key_exists($node->flanders_id, $improvements)) {
                    $node->expectedIndex += $improvements[$node->flanders_id][0];

                    if ($improvements[$node->flanders_id][0] == 0) {
                        continue;
                    }

                    $this->columns[$i + $improvements[$node->flanders_id][1]][] = $node;
                    array_splice($this->columns[$i], $j, 1);
                    unset($improvements[$node->flanders_id]);
                    $j = -1;
                }

            }

        }
    }

    protected function improveOffsets($improvements)
    {
        for ($i = 1; $i < count($this->columns); $i++) {

            for ($j = 0; $j < count($this->columns[$i]); $j++) {

                $node = $this->columns[$i][$j];
                if (array_key_exists($node->flanders_id, $improvements)) {
                    $node->elementYOffset += $improvements[$node->flanders_id][0];

                    if ($improvements[$node->flanders_id][0] == 0) {
                        continue;
                    }

                    $this->columns[$i + $improvements[$node->flanders_id][1]][] = $node;
                    array_splice($this->columns[$i], $j, 1);
                    unset($improvements[$node->flanders_id]);
                    $j = -1;
                }

            }

        }
    }

}