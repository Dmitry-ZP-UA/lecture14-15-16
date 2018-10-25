<?php

namespace App\Shop\Carts;

class ShoppingCart
{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $count;

    /**
     * @var
     */
    public $price;

    /**
     * @var
     */
    public $total;

    /**
     * ShoppingCart constructor.
     * @param $id
     * @param $name
     * @param $count
     * @param $price
     */
    public function __construct($id, $name, $count, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->count = $count;
        $this->price = $price;
        $this->total = $price * $count;
    }
}
