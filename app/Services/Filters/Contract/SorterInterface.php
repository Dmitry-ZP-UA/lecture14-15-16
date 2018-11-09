<?php

namespace App\Services\Filters\Contract;

use Illuminate\Support\Collection;

/**
 * Interface SorterInterface
 * @package App\Services\Filters\Contract
 */
interface SorterInterface
{
    /**
     * @param Collection $collection
     * @return Collection
     */
    public function sorter(Collection $collection,  bool $sortAsc): Collection;
}
