<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Item;

class OrderItem extends Model
{
    //
    protected $fillable = ['order_id', 'item_id', 'quantity', 'price'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}