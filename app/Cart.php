<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Item;

class Cart extends Model
{
    protected $fillable = ['user_id', 'item_id'];


    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}