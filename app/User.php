<?php

namespace App;

use App\Order;
use App\Cart;
use App\PaymentType;
use App\UserPayment;
use App\UserMessage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function sendMessage($messageId)
    {
        $this->messages()->attach($messageId);
    }

    public function messages()
    {
        return $this->belongsToMany(Message::class, 'message_user', 'recipient_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function payment()
    {
        return $this->hasOne(UserPayment::class, 'user_id');
    }

    public function updatePayment($requestId)
    {
        return $this->payment()->updateOrCreate(['user_id' => $this->id], ['payment_type_id' => $requestId]);
    }
}