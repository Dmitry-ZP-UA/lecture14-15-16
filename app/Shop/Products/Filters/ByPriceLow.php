<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 08.11.18
 * Time: 13:00
 */

namespace App\Shop\Products\Filters;


use App\Services\Filters\Filter;
use App\Shop\Products\Product;

class ByPriceLow extends Filter
{
    protected function getAlgorithm(): callable
    {
        return function (Product $product) {
            return $product->orderBy('price', 'asc');
        };

    }

}
