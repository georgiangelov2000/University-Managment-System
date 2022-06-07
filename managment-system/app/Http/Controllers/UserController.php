<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index(){
        return View::make('users.index');
    }

    public function create() {
        $courses = Course::all();
        return View::make('users.create')->with('courses', $courses);
    }

    public function store(UserRequest $request) {
        $validated = $request->validated();
        User::create($validated);
        return redirect()->route('user.index');
    }

    public function show(User $user){
        $result = $user->courses()->get();
        return response($result);
    }

    public function edit (User $user){
        $courses = Course::all();
        return View::make('users.edit',compact('user','courses'));
    }

    public function update(UserRequest $request,User $user){
        $validated = $request->validated();
        $user->update($validated);
        return redirect()->route('user.index')->with('success','Successfully created data');
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('user.index');
    }
}
