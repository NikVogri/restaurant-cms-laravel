<?php

namespace App;

use App\User;
use App\MessageUser;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = ['title', 'body', 'author_id', 'read'];

    public function users()
    {
        return $this->hasMany(User::class)
            ->using(MessageUser::class)
            ->withPivot(['read']);;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}