<?php

namespace App;

use App\Order;
use App\UserPaymentType;
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
        'name', 'email', 'password',
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


    public function paymentType()
    {
        return $this->hasOne(UserPaymentType::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function messages()
    {
        return $this->hasMany(UserMessage::class, 'receive_user_id');
    }

    public function sendMessage($messageId)
    {


        UserMessage::create([
            'receive_user_id' => $this->id,
            'message_id' => $messageId,
        ]);
    }
}