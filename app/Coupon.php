<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];


    public function isValid()
    {
        return $this->valid_until > Carbon::now();
    }
}