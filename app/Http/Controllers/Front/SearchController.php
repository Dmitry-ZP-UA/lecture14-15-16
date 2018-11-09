<?php

namespace App\Http\Controllers\Front;

use App\Services\Searcher\ProductSearcher;
use App\Shop\Products\DataCollector\ProductCollector;
use Illuminate\Http\Request;

class SearchController
{
    const SORT_ASC = 0;
    const SORT_DESC = 1;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(ProductCollector $productCollector, Request $request, ProductSearcher $searcher)
    {
        $productsSearch = $searcher->search($request->search);
        $products = $productCollector->collect(self::SORT_ASC, $productsSearch);

        return view('front.products.product-search', [
            'products' => $products,
        ]);
    }

}
