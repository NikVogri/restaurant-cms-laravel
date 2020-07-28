<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = ['alert_type'];

    public function remove()
    {
        return $this->delete();
    }
}