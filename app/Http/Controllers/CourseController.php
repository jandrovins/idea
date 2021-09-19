<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function list(Request $request)
    {
        $sort = 'id_asc';  // default sort value

        if ($request->has('sort')) {
            $sort = $request->get('sort');
        }

        $data = ['title' => 'List of all courses'];

        switch ($sort) {
            case 'id_asc':
                $data['courses'] = Course::all()->sort();
                break;
            case 'id_desc':
                $data['courses'] = Course::all()->sortDesc();
                break;
        }

        return view('courses.list')->with('data', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Course',
            'courses' => Course::all(),
        ];

        return view('courses.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Course::validate($request);
        Course::create($request->only(['title', 'learningStyles', 'categories', 'price', 'summary']));

        return back()->with('success', 'Course created successfully!');
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return back()->with('success', 'Course deleted successfully!');
    }
}
