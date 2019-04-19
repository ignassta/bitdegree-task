<?php

use App\Course;
use App\Group;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Course::class, 30)->create();

        $courses = Course::all();

        //course_user pivot table seeder
        App\User::all()->each(function ($user) use ($courses) { 
            $user->courses()
                ->attach($courses->random(rand(5, 20))
                ->pluck('id')->toArray()
            ); 
        });
    }
}
