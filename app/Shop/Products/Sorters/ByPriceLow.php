<?php

namespace App\Shop\Products\Sorters;

use App\Services\Filters\Sorter;
use App\Shop\Categories\Category;
use App\Shop\Products\Product;
use Illuminate\Support\Collection;

class ByPriceLow extends Sorter
{
    private $byCategorySort;

    public function __construct(ByCategoryNameSort $byCategoryNameSort)
    {
        $this->byCategorySort = $byCategoryNameSort;
    }

    function getAlgorithm(): callable
    {
        return function (Product $product) {
            collect($product->category_id)->filter(function (Category $category) {
                return $category->product;
            });
            return function (Product $product){
                $product->price;
            };


        };
    }
}
