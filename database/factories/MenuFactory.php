<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Menu::class, function (Faker $faker) {
    return [
        'menu_name' => $faker->paragraph,
        'menu_link' => $faker->paragraph
    ];
});
