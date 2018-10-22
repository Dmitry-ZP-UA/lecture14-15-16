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
     * @var CartService
     */
    protected $cartService;

    /**
     * CartComposer constructor.
     * @param CartService $service
     */
    public function __construct(CartService $service)
    {
        $this->cartService = $service;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('cartCount', $this->cartService->getCartCount());
    }
}
