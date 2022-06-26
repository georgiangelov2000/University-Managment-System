<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

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
        try {
            DB::beginTransaction();
                $validated = $request->validated();
                $this->userService->createUser($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Transaction Failed', ['e' => $e]);
            return back();
        }
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

    public function update(User $user, UserRequest $request){
        try {
            DB::beginTransaction();
                $validated = $request->validated();
                $this->userService->updateUser($validated,$user);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Transaction Failed', ['e' => $e]);
            return back();
        }
        return redirect()->route('user.index')->with('success','Successfully updated data');
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('user.index');
    }
}
