<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function list()
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
        ];

        return view('courses.show')->with('data', $data);
    }
}
