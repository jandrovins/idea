<?php

//Author: Adrian Alberto Gutierrez Leal

namespace App\Http\Controllers;

use App\Models\Lesson;

class LessonController extends Controller
{
    public function list($course_id)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Idea';
        $data['lessons'] = Lesson::where('course_id', '=', $course_id)->get();
        $data['course'] = $data['lessons'][0]->course;

        return view('lesson.list')->with('data', $data);
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $data['title'] = $lesson->getTitle();
        $data['lesson'] = $lesson;

        return view('lesson.show')->with('data', $data);
    }
}
