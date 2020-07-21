<?php

namespace App;

use App\User;
use App\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['customer_id', 'price', 'completed'];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function complete($completed = true)
    {
        $this->update([
            'completed' => $completed
        ]);
    }
}