<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $coursesCount = $user->courses->count();
        $coursesDurationSum = round($user->courses->sum('duration') / 3600);

//        dd($user->courses->first()->group);

        return view('index', compact('user','coursesCount', 'coursesDurationSum'));
    }
}
