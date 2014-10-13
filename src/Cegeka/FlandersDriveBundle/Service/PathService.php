<?php


namespace Cegeka\FlandersDriveBundle\Service;


class PathService
{
    /** @var array */
    protected $currentPath = array();

    /** @var array */
    protected $longestPath = array();

    /** @var array */
    protected $nodes = array();

    /** @var boolean */
    protected $limitToMainFlow;

    /**
     * @param $steps
     * @param $start
     * @param $end
     * @param bool $limitToMainFlow
     * @return array
     */
    public function getLongestPath($steps, $start, $end, $limitToMainFlow = false)
    {
        $this->reset($steps, $limitToMainFlow);
        $this->calculateLongestPath($start, $end);

        return $this->longestPath;
    }

    /**
     * @param string $start
     * @param string $end
     */
    protected function calculateLongestPath($start, $end)
    {
        $node = $this->nodes[$start];
        $this->currentPath[] = $node->flanders_id;

        if ($node->flanders_id == $end) {
            if (sizeof($this->currentPath) > sizeof($this->longestPath)) {
                $this->longestPath = $this->currentPath;
            }
        } else {
            foreach ($node->links as $link) {
                if ($this->limitToMainFlow && !$this->nodes[$link->flanders_id]->main_flow) {
                    continue;
                }

                if (!in_array($link->flanders_id, $this->currentPath)) {
                    $this->calculateLongestPath($link->flanders_id, $end);
                }
            }
        }

        array_pop($this->currentPath);
    }

    /**
     * @param array $steps
     * @param boolean $limitToMainFlow
     */
    protected function reset($steps, $limitToMainFlow)
    {
        $this->nodes = $steps;
        $this->limitToMainFlow = $limitToMainFlow;
        $this->currentPath = array();
        $this->longestPath = array();
    }

}