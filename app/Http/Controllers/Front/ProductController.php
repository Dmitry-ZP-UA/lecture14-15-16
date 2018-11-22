<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Searcher\ProductSearcher;
use App\Shop\Comments\Comment;
use App\Shop\Products\Product;
use App\Shop\Products\Transformations\ProductTransformable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ProductTransformable;
    /**
     * @var Product
     */
    private $product;

    /**
     * @var Comment
     */
    private $comment;

    /**
     * ProductController constructor.
     * @param Product $product
     * @param Comment $comment
     */
    public function __construct(Product $product, Comment $comment)
    {
        $this->comment = $comment;
        $this->product = $product;
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug, Request $request)
    {
        $product = $this->product->where('slug', $slug)->first();

        $comments = $this->comment->where('product_id', $product->id)
            ->orderBy($request->sort ?: 'created_at', 'desc')
            ->get();

        return view('front.products.product', [
            'product' => $product,
            'comments' => $comments,
        ]);
    }

}
