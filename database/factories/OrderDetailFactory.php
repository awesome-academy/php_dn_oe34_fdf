<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\OrderDetail::class, function (Faker $faker) {
    static $orderId = 0;

    return [
        'order_id' => ++$orderId,
        'product_id' => $faker->numberBetween(1, 10),
        'quantity' => $faker->numberBetween(1, 10),
        'unit_price' => $faker->randomFloat(null, 0, 1000000),
    ];
});
