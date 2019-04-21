<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $userCourses = $user->courses;
        $groups = Group::all();
        $coursesTotal = $userCourses->count();
        $cerfiticatesTotal = $userCourses->where('certificate', 1)->count();

        //define xp base to control xp ratio rise for each lvl
        define('XP_BASE', 20);

        //user xp
        $currentXp = $userCourses->sum('xp');

        //current user lvl
        $lvl = floor(sqrt($currentXp / XP_BASE));

        //count total xp needed for next lvl
        $oldLvl = $lvl;
        $xpToLvlUp = $currentXp;
        for ($i = floor($oldLvl); $i <= floor($oldLvl+1); $i = sqrt($xpToLvlUp++ / XP_BASE)) {
            echo '';
        }

        $xpStats = ['lvl' => $lvl, 'current_xp' => $currentXp, 'xp_to_lvl_up' => $xpToLvlUp];

        //seconds to hours
        $coursesDurationSum = round($userCourses->sum('duration') / 3600);

        //get random lecturer that has at least one course viewed by this user
        $randomCourseIndex = rand(0, $coursesTotal-1);
        $usersRandomLecturer = $userCourses[$randomCourseIndex]->lecturer;

        //sort user courses by course groups and put it to array
        $userGroups = [];
        foreach ($userCourses as $course)
        {
            $userGroups[] = $course->group->title;
        }
        $userGroups = array_count_values($userGroups);

        //count group completion ratio and merge it with group title to array
        $userGroupsWithCompRatio = [];
        foreach ($userGroups as $groupTitle => $finishedCourses) {
            $groupCoursesTotal = $groups->where('title', $groupTitle)->first()->courses->count();
            $groupCompletionRatio = round($finishedCourses * 100 / $groupCoursesTotal);
            $userGroupsWithCompRatio[] = ['group-title' => $groupTitle, 'completion-ratio' => $groupCompletionRatio];
        }

        return view('index',
            compact('user','coursesTotal', 'cerfiticatesTotal', 'coursesDurationSum', 'userGroupsWithCompRatio', 'usersRandomLecturer', 'xpStats'));
    }
}
