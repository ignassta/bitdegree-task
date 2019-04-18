<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

        $id = User::all()->first()->id;

        return redirect()->route('user.show', ['id' => $id]);
    }
}
