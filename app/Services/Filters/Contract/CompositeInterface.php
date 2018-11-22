<?php

namespace App\Services\Filters\Contract;

/**
 * Interface CompositeInterface
 * @package App\Services\Filters\Contract
 */
interface CompositeInterface
{
    /**
     * @param SorterInterface $filter
     * @return mixed
     */
    public function addSorter(SorterInterface $filter);
}
