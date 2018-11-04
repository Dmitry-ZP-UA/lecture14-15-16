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
     * @param Comment $comment
     */
    public function __construct(Product $product, Comment $comment)
    {
        $this->comment = $comment;
        $this->product = $product;
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AddToComment(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

        $product = $this->product->where('slug', $slug)->first();

        $data = $request->all();
        $this->comment->fill($data);
        $this->comment->save();

        return redirect()->route('front.get.product',[
            'product' => $product->slug,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $slug)
    {
        $product = $this->product->where('slug', $slug)->first();

        if(isset($request->likes_counter))
        {
            $comment = $this->comment->where('id', $request->id)->first();
            $comment->likes_counter = $request->likes_counter;
            $comment->save();
        }

        return redirect()->route('front.get.product',[
            'product' => $product->slug,
        ]);
    }


    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
       $product = $this->product->where('slug', $slug)->first();
       $comments = $this->comment->where('product_id', $product->id)
           ->orderBy('id', 'desc')
           ->get();


        return view('front.products.product', [
            'product' => $product,
            'comments' => $comments,
        ]);
    }

}
