<?php


namespace Tasks\Sorting;


/**
 * Hoare partition quicksort algorithm implementation
 * @link https://en.wikipedia.org/wiki/Quicksort#Hoare_partition_scheme
 * @package Tasks\Sorting
 */
class QuickHoarePartition extends AbstractSort
{
    public function sort(): self
    {
        $array = $this->getArray();
        self::partition($array);
        $this->setArray($array);
        return $this;
    }

    /**
     * Partition quicksort algorithm
     * @param array $array
     * @param int $left
     * @param int $right
     * @return void
     */
    private static function partition(array &$array, int $left = 0, int $right = 0): void
    {
        if ($right === 0) {
            $right = count($array) - 1;
        }
        $i = $left;
        $j = $right;
        $pivot = $array[($left + $right) / 2];
        do {
            while ($array[$i] < $pivot) {
                $i++;
            }
            while ($array[$j] > $pivot) {
                $j--;
            }
            if ($i <= $j) {
                if ($array[$i] > $array[$j]) {
                    [$array[$i], $array[$j]] = array($array[$j], $array[$i]);
                }
                $i++;
                $j--;
            }
        } while ($i <= $j);
        if ($i < $right) {
            self::partition($array, $i, $right);
        }
        if ($j > $left) {
            self::partition($array, $left, $j);
        }
    }
}