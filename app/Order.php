<?php

namespace App;

use App\User;
use App\Payment;
use App\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['customer_id', 'price', 'completed', 'paymentType_id'];

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
    public function paymentType()
    {
        return $this->belongsTo(Payment::class, 'paymentType_id');
    }
}