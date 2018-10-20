<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Products\Product;
use App\Shop\Products\Transformations\ProductTransformable;

class ProductController extends Controller
{
    use ProductTransformable;

    /**
     * @var Product
     */
    private $product;

    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

}
