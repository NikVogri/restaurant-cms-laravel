<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $table = 'payment_type_user';
    protected $fillable = ['payment_type_id'];
}