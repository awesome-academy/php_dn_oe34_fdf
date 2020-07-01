<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Order::class, function (Faker $faker) {
    $userId = 2;
    $order_label = strtoupper(now()->monthName) . now()->day . str_replace(':', '', now()->toTimeString()) . $userId;

    return [
        'user_id' => $userId,
        'order_code' => $order_label,
        'total_price' => $faker->randomFloat(null, 0, 100000),
        'status' => $faker->boolean,
    ];
});
