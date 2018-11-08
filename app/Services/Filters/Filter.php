<?php

namespace App\Services\Filters;

    use App\Services\Filters\Contract\FilterInterface;
    use Illuminate\Support\Collection;

    /**
     * Class Filter
     * @package App\Services\Filters
     */
abstract class Filter implements FilterInterface
{
    /**
     * @param Collection $collection
     * @return Collection
     */
    public function filter(Collection $collection): Collection
    {
        return $collection->filter($this->getAlgorithm());
    }

    /**
     * @return callable
     */
    abstract protected function getAlgorithm(): callable;
}

