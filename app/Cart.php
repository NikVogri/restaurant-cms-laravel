<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\CartItem;

class Cart extends Model
{
    protected $fillable = ['user_id', 'item_id'];


    public function items()
    {
        return $this->hasMany(CartItem::class);
    }


    public function totalPrice()
    {
        $totalPrice = 0;

        foreach ($this->items as $item) {
            $totalPrice += $item->item->price;
        }
        return $totalPrice;
    }
}