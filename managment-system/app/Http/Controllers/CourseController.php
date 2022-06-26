<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\ProgramRequest;
use App\Models\Course;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    public function index()
    {
        $years = Course::select('year_of_course')->get();

        return View::make('courses.index',['years' => $years]);
    }

    public function create()
    {
        return View::make('courses.create');
    }

    public function store(CourseRequest $request)
    {
        $validated = $request->validated();
        Course::create($validated);
        return redirect()->route('course.index')->with('success','Successfully created data');
    }

    public function show(Course $course)
    {
        $result = $course->users()->get();
        return response($result);
    }

    public function edit(Course $course)
    {
        return View::make('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request,Course $course)
    {
        $validated = $request->validated();
        $course->update($validated);
        return redirect()->route('course.index')->with('success','Successfully updated data');
    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index');
    }

    public function createProgram(Course $course){
        $subjects = $course->subjects()->get();
        $course_id  = $course->id;
        return View::make('courses.create_program',compact('course_id'), ['subjects'=>$subjects]);
    }

    public function storeProgram(Course $course, ProgramRequest $request){
        $validated = $request->validated();
        $program = new Program();

        foreach ($validated['subject_id'] as $key => $value) {
            $program->create([
                'course_id' => $course->id,
                'subject_id' => $validated['subject_id'][$key],
                'hour' => $validated['hour'][$key],
                'date' => $validated['date'][$key]
            ]);
        }

        return redirect()->route('course.index')->with('success','Successfully created program');
    }

    public function students(Course $course){
        return View::make('courses.students',compact('course'));
    }

}
