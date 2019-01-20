<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->paragraph,
        'link' => $faker->paragraph
    ];
});
