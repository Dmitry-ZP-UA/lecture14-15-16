<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 22.10.18
 * Time: 21:16
 */

namespace App\Http\Controllers\ViewComposers;


use App\Shop\Carts\Services\CartService;
use Illuminate\View\View;

class CartComposer
{
    /**
     * The categories repository implementation.
     *
     * @var CartService
     */
    protected $cartService;

    /**
     * Create a new cart composer.
     *
     * @param  CartService $categories
     * @return void
     */
    public function __construct(CartService $service)
    {
        $this->cartService = $service;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cartCount', $this->cartService->getCartCount());
    }
}
