<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\Lecturer;
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

        //user xp
        $userXp = $userCourses->sum('xp');

        //corrent user lvl
        $lvl = floor(sqrt($userXp / 30));

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
            compact('user','coursesTotal', 'cerfiticatesTotal', 'coursesDurationSum', 'userGroupsWithCompRatio', 'usersRandomLecturer', 'lvl'));
    }
}
