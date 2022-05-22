<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetachCourseRequest;
use App\Http\Requests\SubjectRequest;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{
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
        $validated = $request->validated();
        $newSubject = Subject::create($validated);

        $courseId = $request->get('course_id');
        $newSubject->courses()->attach($courseId);
        return redirect()->route('course.index')->with('success', 'Successfully created data');
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
        $validated = $request->validated();

        $subject->update($validated);

        $courseId = $request->get('course_id');
        $subject->courses()->sync($courseId);
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
        return redirect()->route('subject.index')->with('success', 'Successfully deleted data');
    }

    public function detachCourse (Subject $subject,DetachCourseRequest $request) {
        $detachedIds = $request->validated();

        foreach ($detachedIds as $key => $value) {
            $subject->courses()->detach($value);
        }
        return redirect()->back()->with('success','Successfully detached data');
    }
}
