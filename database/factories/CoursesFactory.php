<?php

use App\Course;
use App\Group;
use App\Lecturer;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {

    $randomTrueFalse = rand(0,1);

    return [
        'title' => $faker->sentence(1),
        'group_id' => Group::inRandomOrder()->first()->id,
        'lecturer_id' => Lecturer::inRandomOrder()->first()->id,
        'duration' => $faker->numberBetween($min = 1200, $max = 10800),
        'certificate' => $randomTrueFalse,
        'xp' => $randomTrueFalse ? 15 : 10
    ];
});
