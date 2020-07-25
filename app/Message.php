<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = ['title', 'body', 'author_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}