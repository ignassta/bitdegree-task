<?php

use App\Badge;
use App\Course;
use App\User;
use Illuminate\Database\Seeder;

class PivotTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        $badges = Badge::all();
        $users = User::all();

        //badge_user pivot table seeder
        $users->each(function ($user) use ($courses) {
            $user->courses()
                ->attach($courses->random(rand(5, 20))
                ->pluck('id')->toArray()
            );
        });

        //course_user pivot table seeder
        $users->each(function ($user) use ($badges) {
            $user->badges()
                ->attach($badges->random(rand(1, 4))
                ->pluck('id')->toArray()
            );
        });
    }
}
