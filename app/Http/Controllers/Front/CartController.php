<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Carts\Requests\AddToCartRequest;
use App\Shop\Carts\Services\CartService;
use App\Shop\Products\Product;


final class CartController extends Controller
{

    protected $product;

    protected $cartService;


    public function __construct(Product $product, CartService $cartService)
    {
        $this->product = $product;
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cart = $this->cartService->getCartDataForView();
        $sum = $this->cartService->getCartTotalSum();

        return view("front.carts.cart", compact('cart', 'sum'));
    }

    public function store(AddToCartRequest $request)
    {
        $product = $this->product->where('id', $request->get('product'))->first();
        $quantity = $request->get('quantity');
        $this->cartService->addToCart($product, $quantity);
        return redirect()->route('cart.index');
    }

    public function update()
    {

    }

    public function delete()
    {

    }


}
