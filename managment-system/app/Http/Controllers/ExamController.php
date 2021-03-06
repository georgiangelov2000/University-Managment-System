<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Http\Services\ExamService;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ExamController extends Controller
{

    public $examService;

    public function __construct(ExamService $examService,){
        $this->examService = $examService;
    }

    public function index()
    {
        return View::make('exams.index');
    }

    public function create()
    {
        $courses = Course::all();
        $subjects = Subject::all();
        $users = User::where('role','student')->get();

        $attached_subjects = DB::table('exams')->select('subject_id')->get()->toArray();

        $attached_ids = [];

        foreach ($attached_subjects as $subject) {
            $attached_ids = [
                'id' => $subject->subject_id,
            ];
        }

        return View::make('exams.create')
        ->with('courses', $courses)
        ->with('subjects', $subjects)
        ->with('users', $users)
        ->with('attached_ids', $attached_ids);
    }

    public function store(ExamRequest $request)
    {

        try {
            DB::beginTransaction();
                $validated = $request->validated();
                $this->examService->storeService($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Transaction Failed', ['e' => $e]);
            return back();
        }

        return redirect()->route('exam.index')->with('success', 'Successfully created data');
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
        try {
            DB::beginTransaction();
                $validated = $request->validated();
                $this->examService->updateSerivce($exam, $validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Transaction Failed', ['e' => $e]);
            return back();
        }
        return redirect()->route('exam.index')->with('success', 'Successfully updated data');
    }

    public function show(Exam $exam)
    {
        return View::make('exams.user_has_exams', compact('exam'));
    }

    public function detachStudent(Exam $exam, Request $request)
    {
        $user_id = $request->input('user_id');
        $exam->users()->detach($user_id);
        return redirect()->back()->with('success', 'Successfully detached student');
    }

    public function delete(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exam.index')->with('success', 'Successfully deleted data');
    }

}
