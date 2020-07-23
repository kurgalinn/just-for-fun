<?php declare(strict_types=1);


namespace Tasks\Sorting;


abstract class AbstractSort implements SortInterface
{
    /**
     * Array for sorting
     * @var array
     */
    private array $array;

    /**
     * @return $this
     */
    abstract public function sort(): self;

    /**
     * AbstractSort constructor.
     * @param $array
     */
    public function __construct($array)
    {
        $this->array = $array;
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * @param array $array
     */
    protected function setArray(array $array): void
    {
        $this->array = $array;
    }
}