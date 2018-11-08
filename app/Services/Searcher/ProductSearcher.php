<?php

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

    /**
     * @param string $param
     * @return mixed
     */
    public function search(string $param)
    {
        return $this->searchProductByName($param);
    }

    /**
     * @param string $param
     * @return mixed
     */
    private function searchProductByName(string $param)
    {
        $product = $this->product->where([
            ['name', 'LIKE', '%' . $param . '%']
        ])->get();

        return $product;
    }

}
