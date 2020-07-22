<?php

namespace App;

use App\Payment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserPaymentType extends Model
{
    protected $table = 'users_payment_type';
    protected $fillable = ['user_id', 'paymentType_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function payment()
    {
        return  $this->belongsTo(Payment::class, 'paymentType_id');
    }
}