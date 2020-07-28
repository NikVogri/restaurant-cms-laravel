<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['name', 'email', 'body', 'read'];


    public function markAsRead()
    {
        return $this->update(['read' => true]);
    }
}