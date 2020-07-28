<?php

namespace App;

use App\User;
use App\paymentType;
use App\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['customer_id', 'price', 'completed', 'payment_id'];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function complete($completed = true)
    {
        // remove alert message

        $this->alert->remove();

        return $this->update([
            'completed' => $completed
        ]);
    }
    public function paymentType()
    {
        return $this->belongsTo(paymentType::class, 'payment_id');
    }

    public function createOrderItem($itemId)
    {
        return $this->items->create([
            'item_id' => $itemId,
            'quantity' => 1, // hardcoded for now
        ]);
    }

    public function totalPrice()
    {
        $price = 0;
        foreach ($this->orderItems as $orderItem) {
            $price += $orderItem->item->price;
        }
        return $price;
    }
}