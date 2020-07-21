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

    public function order_items()
    {
        return $this->belongsToMany(OrderItem::class);
    }

    public function save_to_cart()
    {
        $user_id = auth()->user()->id;

        if (session($user_id)) {
            session($user_id)[] = $this;
        } else {
            session([$user_id => [$this]]);
        }
    }
}