<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function list(Request $request)
    {
        $data = [
            'title' => 'List of all courses',
            'courses' => Course::with('lessons')->paginate(10),

        ];

        return view('courses.list')->with('data', $data);
    }

    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);

        $data = [
            'title' => $course->getTitle(),
            'course' => $course,
        ]; //to be sent to the view

        return view('courses.show')->with('data', $data);
    }
}
