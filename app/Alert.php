<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = ['alert_type', 'order', 'completed'];
}