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

        //add total number of courses for every group that user had courses in
        $userGroupsWithTotal = [];
        foreach ($userGroups as $title => $coursesCount) {
            $groupCoursesTotal = $groups->where('title', $title)->first()->courses->count();
            $userGroupsWithTotal[] = ['title' => $title, 'finished-courses' => $coursesCount, 'total-courses' => $groupCoursesTotal];
        }

        return view('index', compact('user','coursesTotal', 'coursesDurationSum', 'userGroupsWithTotal'));
    }
}
