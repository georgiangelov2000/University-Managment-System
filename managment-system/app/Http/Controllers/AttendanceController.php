<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class AttendanceController extends Controller
{
    public function create(){
        $subjects = Subject::all();
        $users = User::all();

        return View::make('attendances.create',['subjects' => $subjects],['users' => $users]);
    }
}
