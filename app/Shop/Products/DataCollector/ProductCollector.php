<?php

namespace App\Shop\Products\DataCollector;

use App\Services\Filters\Contract\FilterInterface;
use App\Services\Filters\Factory as FilterFactory;
use App\Shop\Products\Product;

class ProductCollector
{
    const FILTER_ALIAS = 'product_filter';

    /**
     * @var FilterFactory
     */
    private $filterFactory;

    /**
     * @var Product
     */
    private $product;

    /**
     * CategoryCollector constructor.
     * @param FilterFactory $filterFactory
     * @param Product $product
     */
    public function __construct(FilterFactory $filterFactory, Product $product)
    {
        $this->filterFactory = $filterFactory;
        $this->product = $product;
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function collect()
    {
        $categories = $this->getProducts();
            $filter = $this->getFilter();
            return $filter->filter($categories);
    }

    /**
     * @return FilterInterface
     */
    private function getFilter(): FilterInterface
    {
        return $this->filterFactory->buildFilter(self::FILTER_ALIAS);
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getProducts()
    {
        return $this->product->get();
    }

}
