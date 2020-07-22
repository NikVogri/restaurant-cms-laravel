<?php

namespace App;

use App\UserPaymentType;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment_types';
    protected $fillable = ['name'];
}