<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'cat_id' => $faker->create(App\Models\Category::class)->cate_id,
        'cat_name' => $faker->paragraph,
        'cat_description' => $faker->paragraph,
        'cat_image' => $faker->paragraph
    ];
});
