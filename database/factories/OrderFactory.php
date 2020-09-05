<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'completed' => 1,
        'created_at' => $faker->dateTimeThisYear(),
        'customer_id' => 1,
        'payment_id' => 1,
        'total_price' => $faker->randomFloat(null, 1, 50),
    ];
});