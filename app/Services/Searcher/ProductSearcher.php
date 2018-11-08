<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 08.11.18
 * Time: 10:33
 */

namespace App\Services\Searcher;


use App\Shop\Products\Product;

class ProductSearcher
{
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductSearcher constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function search(string $param)
    {
        return $this->searchProductByName($param);
    }

    private function searchProductByName(string $param)
    {
        $product = $this->product->where([
            ['name', 'LIKE', '%' . $param . '%']
        ])->get();

        return $product;
    }

}
