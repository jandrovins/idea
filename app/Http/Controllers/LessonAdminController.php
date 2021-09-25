<?php

//Author: Adrian Alberto Gutierrez Leal

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonAdminController extends Controller
{

    public function create($course_id)
    {
        $data = [];
        $data['title'] = 'Idea';
        $data['course_id'] = $course_id;

        return view('admin.lessons.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Lesson::validate($request);
        Lesson::create($request->only(['title', 'body', 'course_id']));

        return redirect()->back()->with('success', __('messages.lesson.create.success'));
    }

    public function edit($id)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Idea';
        $data['lesson'] = Lesson::findOrFail($id);

        return view('admin.lessons.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        Lesson::validate($request);
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());

        return redirect()->back()->with('success', __('messages.lesson.edit.success'));
    }

    public function remove($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect()->back()->with('success', __('messages.lesson.delete.success'));
    }
}
