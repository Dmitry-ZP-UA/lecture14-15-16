<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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

    private $comment;
    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(Product $product, Comment $comment)
    {
        $this->comment = $comment;
        $this->product = $product;
    }

    public function AddToComment(Request $request, $slug)
    {
        $product = $this->product->where('slug', $slug)->first();
       // dd($request->input());

        $data = $request->all();
        $this->comment->fill($data);
        $this->comment->save();

        return redirect()->route('front.get.product',[
            'product' => $product->slug,
        ]);



    }

    public function show($slug)
    {
        $product = $this->product->where('slug', $slug)->first();
        $comments = $this->comment->where('product_id', $product->id)->get();

        return view('front.products.product', [
            'product' => $product,
            'comments' => $comments
        ]);
    }

}
