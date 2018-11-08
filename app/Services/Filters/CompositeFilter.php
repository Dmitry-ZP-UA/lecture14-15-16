<?php

namespace App\Services\Filters;


use App\Services\Filters\Contract\CompositeInterface;
use App\Services\Filters\Contract\FilterInterface;
use Illuminate\Support\Collection;

class CompositeFilter implements CompositeInterface, FilterInterface
{

    /**
     * @var FilterInterface[]
     */
    private $filters = [];

    /**
     * @param FilterInterface $filter
     * @return FilterInterface|mixed
     */
    public function addFilter(FilterInterface $filter)
    {
        return $this->filters[] = $filter;
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    public function filter(Collection $collection): Collection
    {
        foreach ($this->filters as $filter) {
            $collection = $filter->filter($collection);
        }

        return $collection;
    }



}
