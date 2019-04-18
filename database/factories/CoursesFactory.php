<?php

use App\Course;
use App\Group;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'group_id' => Group::inRandomOrder()->first()->id,
        'duration' => $faker->numberBetween($min = 1200, $max = 10800)
    ];
});
