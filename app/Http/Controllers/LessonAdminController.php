<?php

//Author: Adrian Alberto Gutierrez Leal

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonAdminController extends Controller
{
    public function show(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Idea';
        $data['lessons'] = Lesson::all();

        /*
        Course Model doesn't exist yet
        $course = Course::findOrFail($course_id);
        $data["course"] = $course ->getName();
        $data["lesson"] = Lesson::where('product_id','=',$course->getId());
        */

        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'id_asc':
                    $data['lessons'] = $data['lessons']->sort();
                    break;
                case 'id_desc':
                    $data['lessons'] = $data['lessons']->sortDesc();
                    break;
            }
        }

        return view('admin.lessons.show')->with('data', $data);
    }

    public function manage($course_id, Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Idea';
        $data['lessons'] = Lesson::where('course_id', '=', $course_id)->get();
        $data['course'] = $data['lessons'][0]->course;

        return view('admin.lessons.manage')->with('data', $data);
    }

    //course Id, when function is directly called from CourseController
    public function create($course_id)
    {
        $data = [];
        $data['title'] = 'Idea';
        $data['course_id'] = $course_id;
        $lessons = Lesson::where('course_id', '=', $course_id)->get();
        $data['course'] = $lessons[0]->course;

        return view('admin.lessons.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Lesson::validate($request);
        Lesson::create($request->only(['title', 'body', 'course_id']));

        return redirect()->back()->with('success', 'New Lesson added succesfully!!!');
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
        echo 'GOT HERE';
        $lesson->update($request->all());

        return redirect()->back()->with('success', 'Lesson Edited Successfully');
    }

    public function remove($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect()->back()->with('success', 'Lesson Deleted Successfully');
    }
}
