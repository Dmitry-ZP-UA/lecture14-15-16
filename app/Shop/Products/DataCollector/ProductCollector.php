<?php

namespace App\Shop\Products\DataCollector;

use App\Services\Filters\Contract\SorterInterface;
use App\Services\Filters\Exceptions\FilterBuildingException;
use App\Services\Filters\Factory as SorterFactory;
use App\Shop\Products\Product;
use Illuminate\Support\Collection;

/**
 * Class CategoryCollector
 * @package App\Shop\Category\DataCollerctor
 */
class ProductCollector
{
    const FILTER_ALIAS = 'sorter-product';

    /**
     * @var
     */
    private $sorterFactory;

    /**
     * ProductCollector constructor.
     * @param SorterFactory $sorterFactory
     */
    public function __construct(SorterFactory $sorterFactory)
    {
        $this->sorterFactory = $sorterFactory;
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function collect(bool $sortAsc, Collection $products)
    {
        try {
            $sorter = $this->getSorter();
            return $sorter->sorter($products, $sortAsc);
        } catch (FilterBuildingException $exception) {
            return $products;
        }
    }

    /**
     * @return SorterInterface
     * @throws \App\Services\Filters\Exceptions\FilterBuildingException
     */
    private function getSorter(): SorterInterface
    {
        return $this->sorterFactory->buildSorter(self::FILTER_ALIAS);

    }
}
