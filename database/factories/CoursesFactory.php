<?php

use App\Course;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'duration' => $faker->time('H:i:s')
    ];
});
