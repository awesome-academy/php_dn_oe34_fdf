<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Category::class, function (Faker $faker) {
    static $key = 0;
    static $parent_id = null;

    $category = [
        'Food',
        'Drink',
    ];

    if ($key > 1) {
        $categoryName = $faker->name;
        $parent_id = $faker->numberBetween(1, 2);
    } else {
        $categoryName = $category[$key++];
    }

    return [
        'name' => $categoryName,
        'parent_id' => $parent_id,
    ];
});
