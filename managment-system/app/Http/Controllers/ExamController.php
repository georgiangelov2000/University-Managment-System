<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        // dd($exams);
        return View::make('exams.index')->with('exams', $exams);
    }

    public function create()
    {
        $courses = Course::all();
        $subjects = Subject::all();
        $users = User::all();

        return View::make('exams.create')->with('courses', $courses)->with('subjects', $subjects)->with('users', $users);
    }

    public function store(ExamRequest $request)
    {

        //create the exam
        $validated = $request->validated();
        $exam = Exam::create($validated);

        //create users have exams
        $users = $request->get('user_id');
        $exam->users()->attach($users);

        return View::make('exams.index');
    }

    public function edit(Exam $exam)
    {

        $users = User::all();
        $subjects = Subject::all();

        $attachedSubjects = $exam->subjects()->get()->map(function ($v) {
            return $v->id;
        })->toArray();

        $attachedUsers = $exam->users()->get()->map(function ($v) {
            return $v->id;
        })->toArray();

        return View::make(
            'exams.edit',
            compact(
                'exam',
                'attachedUsers',
                'attachedSubjects',
                'subjects',
                'users'
            )
        );
    }

    public function update(Exam $exam ,ExamRequest $request)
    {
        $validated = $request->validated();
        $exam->update($validated);

        $userId = $request->get('user_id');
        $exam->users()->sync($userId);
        return redirect()->route('exam.index')->with('success', 'Successfully updated data');
    }

    public function show(Exam $exam)
    {
        $students = $exam->users()->get();
        return View::make('exams.show', compact('exam'))->with('students', $students);
    }

    public function detachStudent(Exam $exam, Request $request)
    {
        $userID = $request->get('user_id');
        $exam->users()->detach($userID);
        return redirect()->back()->with('success', 'Successfully detached student');
    }

    public function delete(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exam.index')->with('success', 'Successfully deleted data');
    }

}
