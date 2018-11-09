<?php

namespace App\Shop\Products\Sorters;

use App\Services\Filters\Sorter;
use App\Shop\Products\Product;


class ByCategoryNameSort extends Sorter
{

    function getAlgorithm(): callable
    {
        return function (Product $product) {
            return $product->category_id;
        };
    }

}
