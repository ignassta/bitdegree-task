<?php

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
        factory(App\Course::class, 10)->create();

        //course_user pivot table seeder
        $courses = App\Course::all();
        App\User::all()->each(function ($user) use ($courses) { 
            $user->courses()
            ->attach($courses->random(rand(1, 3))
            ->pluck('id')->toArray()
            ); 
        });
    }
}
