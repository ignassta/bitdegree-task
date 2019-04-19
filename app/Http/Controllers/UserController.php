<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $groups = Group::all();
        $coursesTotal = $user->courses->count();
        $coursesDurationSum = round($user->courses->sum('duration') / 3600);

        //sort user courses by course groups
        $userGroups = [];
        foreach ($user->courses as $course)
        {
            $userGroups[] = $course->group->title;
        }
        $userGroups = array_count_values($userGroups);

        //count group completion ratio and merge it with group title in array
        $userGroupsWithCompRatio = [];
        foreach ($userGroups as $groupTitle => $finishedCourses) {
            $groupCoursesTotal = $groups->where('title', $groupTitle)->first()->courses->count();
            $groupCompletionRatio = round($finishedCourses * 100 / $groupCoursesTotal);
            $userGroupsWithCompRatio[] = ['group-title' => $groupTitle, 'completion-ratio' => $groupCompletionRatio];
        }

        return view('index', compact('user','coursesTotal', 'coursesDurationSum', 'userGroupsWithCompRatio'));
    }
}
