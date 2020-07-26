<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MessageUser extends Pivot
{
    //
    protected $fillable = ['read'];
    protected $table = 'message_user';
}