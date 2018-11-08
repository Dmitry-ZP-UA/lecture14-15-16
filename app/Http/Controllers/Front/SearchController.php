<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 08.11.18
 * Time: 12:12
 */

namespace App\Http\Controllers\Front;


use App\Services\Searcher\ProductSearcher;
use Illuminate\Http\Request;

class SearchController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, ProductSearcher $searcher)
    {

        $products = $searcher->search($request->search);

        return view('front.products.product-search', [
            'products' => $products,
        ]);
    }

}
