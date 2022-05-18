<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return View::make('courses.index')->with('courses', $courses);
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
    }
}
