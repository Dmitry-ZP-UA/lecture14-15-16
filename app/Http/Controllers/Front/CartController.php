<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Carts\Requests\AddToCartRequest;
use App\Shop\Carts\Services\CartService;
use App\Shop\Products\Product;


final class CartController extends Controller
{
    /**
     * @var Product
     */
    protected $product;
    /**
     * @var CartService
     */
    protected $cartService;


    /**
     * CartController constructor.
     * @param Product $product
     * @param CartService $cartService
     */
    public function __construct(Product $product, CartService $cartService)
    {
        $this->product = $product;
        $this->cartService = $cartService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cart = $this->cartService->getCartDataForView();
        $sum = $this->cartService->getCartTotalSum();

        return view("front.carts.cart", compact('cart', 'sum'));
    }

    /**
     * @param AddToCartRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddToCartRequest $request)
    {
        $product = $this->product->where('id', $request->get('product'))->first();
        $quantity = $request->get('quantity');
        $this->cartService->addToCart($product, $quantity);
        return redirect()->route('cart.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->cartService->deleteProductFromCart($id);
        return redirect()->route('cart.index');
    }


}
