<?php

namespace App\Services\Filters;

use App\Services\Filters\Contract\SorterInterface;
use Illuminate\Support\Collection;

/**
 * Class Sorter
 * @package App\Services\Filters
 */
abstract class Sorter implements SorterInterface
{
    /**
     * @param Collection $collection
     * @return Collection
     */
    public function sorter(Collection $collection, bool $sortAsc): Collection
    {
        return $sortAsc ? $collection->sortBy($this->getAlgorithm()) : $collection->sortByDesc($this->getAlgorithm());
    }

    /**
     * @return callable
     */
    abstract function getAlgorithm(): callable;

}
