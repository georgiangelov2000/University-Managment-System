<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index(){
        $courses = Course::all();
        return View::make('users.index',['courses'=>$courses]);
    }

    public function create() {
        $courses = Course::all();

        $countries = DB::table('countries')
        ->selectRaw('name')
        ->get();

        return View::make('users.create')->with('courses', $courses)->with('countries', $countries);
    }

    public function store(UserRequest $request) {
        $validated = $request->validated();

        $name = $request->file('picture')->getClientOriginalName();

        $request->file('picture')->storeAs('public/users',$name);

        $validated['picture'] = $request->file('picture')->getClientOriginalName();

        User::create($validated);
        return redirect()->route('user.index')->with('success', 'Successfully created data');
    }

    public function show(User $user){
        $result = $user->courses()->get();
        return response($result);
    }

    public function edit (User $user){
        $courses = Course::all();
        $countries = DB::table('countries')
        ->selectRaw('name')
        ->get();

        return View::make('users.edit',compact('user','courses','countries'));
    }

    public function update(UserRequest $request,User $user){
        $validated = $request->validated();

        $name = $request->file('picture')->getClientOriginalName();

        $request->file('picture')->storeAs('public/users',$name);

        $validated['picture'] = $request->file('picture')->getClientOriginalName();

        $user->update($validated);

        return redirect()->route('user.index')->with('success','Successfully updated data');
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('user.index');
    }
}
