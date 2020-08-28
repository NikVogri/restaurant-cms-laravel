<?php

namespace App;

use App\Order;
use App\Contact;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $with = ['order'];
    protected $guarded = [];

    public function alertable()
    {
        return $this->morphTo();
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'alertable_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'alertable_id');
    }

    public function complete()
    {
        $this->delete();
    }
}