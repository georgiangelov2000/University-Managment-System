<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class AttendanceController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        $users = User::all();

        return View::make('attendances.index',['subjects' => $subjects],['users' => $users]);
    }
    public function create(){
        $subjects = Subject::all();
        $users = User::all();

        return View::make('attendances.create',['subjects' => $subjects],['users' => $users]);
    }

    public function store(AttendanceRequest $request){

        $validated = $request->validated();
        // dd($validated);
        $attendance = new Attendance();
        foreach ($validated['subject_id'] as $key => $value) {
            $attendance->create([
                'user_id' => $validated['user_id'],
                'subject_id' => $validated['subject_id'][$key],
                'date_attendance' => $validated['date_attendance'][$key],
                'is_attendance' => $validated['is_attendance'][$key],
            ]);
        }
        return redirect()->back()->with('success', 'Successfully created data');
    }
    public function destroy(Request $request)
    {
        $attendance = $request->get('attendance');
        Attendance::find($attendance)->delete();
    }
}
