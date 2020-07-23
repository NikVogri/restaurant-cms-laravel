<?php

namespace App;

use App\Message;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{

    protected $table = "message_user";
    protected $fillable = ['receive_user_id', 'message_id'];



    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }
}