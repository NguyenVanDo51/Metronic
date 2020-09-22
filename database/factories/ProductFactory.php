<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->text(200),
        'price' => $faker->numberBetween(100, 200),
        'amount' => $faker->numberBetween(10, 20),
        'category' => 'category'
    ];
});
