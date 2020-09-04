<?php

namespace App;

use App\Cart;
use App\Item;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_item';
    protected $fillable = ['item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}