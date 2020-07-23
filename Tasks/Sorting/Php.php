<?php


namespace Tasks\Sorting;


/**
 * Quick sorting algorithm implementation PHP native function
 * @link https://en.wikibooks.org/wiki/Algorithm_Implementation/Sorting/Quicksort#PHP
 * @package Tasks\Sorting
 */
class Php extends AbstractSort
{
    public function sort(): self
    {
        $array = $this->getArray();
        sort($array);
        $this->setArray($array);
        return $this;
    }
}