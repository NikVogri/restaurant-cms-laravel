<?php

namespace App;

use App\Order;
use App\Cart;
use App\PaymentType;
use App\Address;
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
        'name', 'email', 'password', 'phone_number', 'payment_type_id'
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
        return $this->messages()->attach($messageId);
    }

    public function messages()
    {
        return $this->belongsToMany(Message::class, 'message_user', 'recipient_id')
            ->using(MessageUser::class)
            ->withPivot(['read']);
    }

    public function markAsRead($messageId)
    {
        $this->messages()->updateExistingPivot($messageId, ['read' => true]);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function payment()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}