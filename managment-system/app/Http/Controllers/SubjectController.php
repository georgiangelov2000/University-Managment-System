<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetachCourseRequest;
use App\Http\Requests\SubjectRequest;
use App\Http\Services\SubjectService;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{

    public $subjectService;

    public function __construct(SubjectService $subjectService){
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $subjects = Subject::all();
        return View::make('subjects.index')->with('subjects', $subjects);
    }

    public function create()
    {
        $courses = Course::all();
        return View::make('subjects.create')->with('courses', $courses);
    }

    public function store(SubjectRequest $request)
    {

        try {
            DB::beginTransaction();
                $validated = $request->validated();
                $this->subjectService->storeService($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Transaction Failed',['e' =>$e]);
            return back();
        }
        return redirect()->route('subject.index')->with('success', 'Successfully created data');
    }

    public function edit(Subject $subject)
    {
        $courses = Course::all();
        $courseSubjects = $subject->courses()->get()->map(function ($v) {
            return $v->id;
        })->toArray();
        return View::make('subjects.edit', compact('subject', 'courses', 'courseSubjects'));
    }

    public function update(Subject $subject, SubjectRequest $request)
    {
        try {
            DB::beginTransaction();
                $validated = $request->validated();
                $this->subjectService->updateService($subject,$validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction failed',['e'=>$e]);
            return back();
        }

        return redirect()->route('subject.index')->with('success', 'Successfully updated data');
    }

    public function show(Subject $subject) {
        $courseSubjects = $subject->courses()->get()->map(function ($v) {
            return [
                "title" => $v->title,
                "year_of_course" => $v->year_of_course,
                "fee" => $v->fee,
            ];
        })->toArray();
        return response($courseSubjects);
    }

    public function getCourse(Subject $subject){
        $detachCourses = $subject->courses()->get()->map(function ($v) {
            return [
                "id" => $v->id,
                "title" => $v->title,
            ];
        })->toArray();
        return response($detachCourses);
    }

    public function delete(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index');
    }

    public function detachCourse (Subject $subject,DetachCourseRequest $request) {
        dd($request->all());
        try {
            DB::BeginTransaction();

                $validated = $request->validated();
                $this->subjectService->detachService($subject,$validated);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction failed',['e'=>$e]);
            return back();
        }

        return redirect()->back()->with('success','Successfully detached course');
    }

}
