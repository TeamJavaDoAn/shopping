<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->name,
        'cat_description' => $faker->address,
        'cat_image' => $faker->country
    ];
});
