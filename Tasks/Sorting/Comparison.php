<?php


namespace Tasks\Sorting;


/**
 * Class for analyzing the execution time of different sorting algorithms
 * @package Tasks\Sorting
 */
class Comparison
{
    /**
     * @var float
     */
    private float $timer;

    /**
     * @var array
     */
    private array $results = [];

    /**
     * Comparison constructor.
     * @param string[] $sorting
     * @param int $arraySize
     */
    public function __construct(array $sorting, $arraySize = 100)
    {
        $array = range(0, $arraySize);
        shuffle($array);

        /** @var SortInterface $sortingName */
        foreach ($sorting as $sortingName) {
            if (class_exists($sortingName)) {
                if (class_implements($sortingName)[SortInterface::class]) {
                    $this->startTimer();
                    (new $sortingName($array))->sort();
                    $this->addResult($sortingName);
                } else {
                    throw new \RuntimeException(sprintf("Class %s not implements interface SortInterface", $sortingName));
                }
            } else {
                throw new \RuntimeException(sprintf("Not found sorting class %s", $sortingName));
            }
        }
    }

    /**
     * Output report of execution time sorting
     */
    public function showReport(): void
    {
        usort($this->results, static function ($a, $b) {
            if ($a === $b) {
                return 0;
            }
            return ($a['time'] < $b['time']) ? -1 : 1;
        });
        foreach ($this->results as $result) {
            echo sprintf("%02.6f <- %s\n", $result['time'], $result['name']);
        }
    }

    /**
     * Fixate start time
     */
    protected function startTimer(): void
    {
        $this->timer = microtime(true);
    }

    /**
     * Save execution time result
     * @param $sortingName
     */
    protected function addResult($sortingName): void
    {
        $this->timer = microtime(true) - $this->timer;
        $this->results[] = ['time' => $this->timer, 'name' => $sortingName];
    }
}