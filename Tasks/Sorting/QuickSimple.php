<?php


namespace Tasks\Sorting;


/**
 * Simple quicksort algorithm implementation (that algorithm not used on real life)
 * @link https://en.wikipedia.org/wiki/Quicksort#Hoare_partition_scheme
 * @package Tasks\Sorting
 */
class QuickSimple extends AbstractSort
{
    public function sort(): self
    {
        $array = $this->getArray();
        $array = self::simple($array);
        $this->setArray($array);
        return $this;
    }

    /**
     * Simple quicksort algorithm
     * @param array $array
     * @return array
     */
    private static function simple(array $array): array
    {
        $count = count($array);
        if ($count < 2) {
            return $array;
        }

        $pivot = $array[0];
        $left = [];
        $right = [];
        for ($i = 1; $i < $count; $i++) {
            if ($array[$i] <= $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }

        $left = self::simple($left);
        $right = self::simple($right);

        return array_merge($left, [$pivot], $right);
    }
}