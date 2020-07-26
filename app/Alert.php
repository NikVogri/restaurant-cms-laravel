<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = ['alert_type', 'order', 'completed'];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function remove()
    {
        return $this->delete();
    }
}