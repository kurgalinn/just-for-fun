<?php


namespace Tasks\Sorting;


/**
 * Bubble sorting algorithm implementation
 * @link https://en.wikipedia.org/wiki/Bubble_sort
 * @package Tasks\Sorting
 */
class Bubble extends AbstractSort
{
    public function sort(): self
    {
        $array = $this->getArray();
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            for ($j = ($i + 1); $j < $count; $j++) {
                if ($array[$i] > $array[$j]) {
                    $current = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $current;
                }
            }
        }
        $this->setArray($array);
        return $this;
    }
}