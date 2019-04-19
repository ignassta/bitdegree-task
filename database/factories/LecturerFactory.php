<?php

use App\Lecturer;
use Faker\Generator as Faker;

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'profession' => $faker->jobTitle,
        'quote' => $faker->paragraph,
        'photo' => 'images/man-photo.png',
    ];
});
