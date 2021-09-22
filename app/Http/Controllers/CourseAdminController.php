<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseAdminController extends Controller
{
    public function list()
    {
        $data = [
            'title' => 'Manage courses',
            'courses' => Course::with('lessons')->paginate(10),
        ];

        return view('admin.courses.list')->with('data', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Course',
            'courses' => Course::all(),
        ];

        return view('admin.courses.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Course::validate($request);
        Course::create($request->only(['title', 'learningStyle', 'categories', 'price', 'summary']));

        return back()->with('success', __('messages.course.create.success'));
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return back()->with('success', __('messages.course.delete.success'));
    }

    public function edit($id)
    {
        $course = Course::with('lessons')->findOrFail($id);

        $data = [
            'title' => 'Edit '.$course->getTitle(),
            'course' => $course,
        ];

        return view('admin.courses.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        Course::validate($request);

        $course = Course::findOrFail($id);

        $course->update($request->all());

        return back()->with('success', __('messages.course.edit.success'));
    }
}