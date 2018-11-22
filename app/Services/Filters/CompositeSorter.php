<?php

namespace App\Services\Filters;

use App\Services\Filters\Contract\CompositeInterface;
use App\Services\Filters\Contract\SorterInterface;
use Illuminate\Support\Collection;

/**
 * Class CompositeSorter
 * @package App\Services\Filters
 */
class CompositeSorter implements SorterInterface, CompositeInterface
{
    /**
     * @var SorterInterface[]
     */
    private $sorters = [];

    /**
     * @param SorterInterface $filter
     * @return SorterInterface|mixed
     */
    public function addSorter(SorterInterface $filter)
    {
        return $this->sorters[] = $filter;
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    public function sorter(Collection $collection, bool $sortAsc): Collection
    {
        foreach ($this->sorters as $sorter) {
            $collection = $sorter->sorter($collection, $sortAsc);
        }

        return $collection;
    }
}
