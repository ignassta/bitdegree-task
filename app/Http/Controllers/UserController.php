<?php

namespace App\Http\Controllers;

use App\Group;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $userCourses = $user->courses;
        $userBadges = $user->badges;
        $groups = Group::all();
        $certificates = $userCourses->where('certificate', 1);

        $coursesTotal = $userCourses->count();
        $certificatesTotal = $certificates->count();
        $coursesDurationSum = $this->userService->secondsToHours($userCourses->sum('duration'));

        $coursesStats = [
            'courses_total' => $coursesTotal,
            'certificates_total' => $certificatesTotal,
            'courses_duration_sum' => $coursesDurationSum
        ];

        //get user xp stats
        $currentXp = $userCourses->sum('xp');
        $xpStats = $this->userService->xpStatsCounter($currentXp);

        //get random lecturer that has at least one course viewed by this user
        $usersRandomLecturer = $this->userService->randomLecturer($coursesTotal, $userCourses);

        //get user progress info
        $userProgresses = $this->userService->userProgress($userCourses, $groups);

        return view('index',
            compact('user', 'userBadges', 'coursesStats', 'certificates', 'userProgresses', 'usersRandomLecturer', 'xpStats'));
    }
}
