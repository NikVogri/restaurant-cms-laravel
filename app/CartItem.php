<?php

namespace App;

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
}