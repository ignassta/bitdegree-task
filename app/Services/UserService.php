<?php

namespace App\Services;


class UserService
{
    public function secondsToHours($coursesDurationInSeconds)
    {
        return round($coursesDurationInSeconds / 3600);
    }

    public function xpStatsCounter($currentXp)
    {
        //define xp base to control xp ratio rise for each lvl
        define('XP_BASE', 20);

        //current user lvl
        $lvl = floor(sqrt($currentXp / XP_BASE));

        //count total xp needed for next lvl
        $oldLvl = $lvl;
        $xpToLvlUp = $currentXp;
        for ($i = floor($oldLvl); $i <= floor($oldLvl+1); $i = sqrt($xpToLvlUp++ / XP_BASE)) {
            echo '';
        }

        $xpStats = ['lvl' => $lvl,
                    'current_xp' => $currentXp,
                    'xp_to_lvl_up' => $xpToLvlUp
        ];

        return $xpStats;
    }

    public function randomLecturer($coursesTotal, $userCourses)
    {
        //get random lecturer that has at least one course viewed by this user
        $randomCourseIndex = rand(0, $coursesTotal-1);
        $usersRandomLecturer = $userCourses[$randomCourseIndex]->lecturer;

        return $usersRandomLecturer;
    }

    public function userProgress($userCourses, $groups)
    {
        //sort user courses by groups and put it to array
        $userGroups = [];
        foreach ($userCourses as $course)
        {
            $userGroups[] = $course->group->title;
        }
        $userGroups = array_count_values($userGroups);

        //count group completion ratio and merge it with group title to array
        $userProgresses = [];
        foreach ($userGroups as $groupTitle => $finishedCourses) {
            $groupCoursesTotal = $groups->where('title', $groupTitle)->first()->courses->count();
            $groupCompletionRatio = round($finishedCourses * 100 / $groupCoursesTotal);
            $userProgresses[] = ['group-title' => $groupTitle, 'completion-ratio' => $groupCompletionRatio];
        }

        return $userProgresses;
    }
}
