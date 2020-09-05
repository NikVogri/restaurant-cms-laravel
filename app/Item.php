<?php

namespace App;

use App\Category;
use App\OrderItem;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    //

    protected $fillable = ['name', 'image', 'price', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function imagePath()
    {
        return 'storage/' . $this->image;
    }


    public function order_item()
    {
        return $this->hasOne(OrderItem::class);
    }
}