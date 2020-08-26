<?php

namespace App;

use App\Alert;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'body', 'read'];

    public function markAsRead()
    {
        return $this->update(['read' => true]);
    }

    public function alert()
    {
        return $this->morphOne('App\Alert', 'alertable');
    }
}