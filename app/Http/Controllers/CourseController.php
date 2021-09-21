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

        $courses = Course::paginate(10);

        switch ($sort) {
            case 'id_asc':
                $data['courses'] = $courses->sort();
                break;
            case 'id_desc':
                $data['courses'] = $courses->sortDesc();
                break;
        }

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
