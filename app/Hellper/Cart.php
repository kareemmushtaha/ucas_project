<?php

namespace App\Hellper;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = [];
    public $totalQty;
    public $totalPrice;


    public function __Construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;


        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($meal)
    {
        /* save items */
        $item = [
            'id' => $meal->id,
            'name' => $meal->name,
            'price' => $meal->price,
            'qty' => 0,
            'img' => $meal->img,
            'details' => $meal->details,
            'Resturnt_id' => $meal->Resturnt_id,
        ];
        if (!array_key_exists($meal->id, $this->items)) {
            $this->items[$meal->id] = $item;
            $this->totalQty += 1;
            $this->totalPrice += $meal->price;
        } else {
            $this->totalQty += 1;
            $this->totalPrice += $meal->price;
        }
        $this->items[$meal->id]['qty'] += 1;
    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

}
