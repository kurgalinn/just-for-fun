<?php declare(strict_types=1);


namespace Tasks\Sorting;


interface SortInterface
{
    /**
     * @return $this
     */
    public function sort(): self;

    /**
     * @return array
     */
    public function getArray(): array;
}