<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'bio' => $faker->paragraph(3, true),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
