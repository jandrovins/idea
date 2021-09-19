<?php

//Author: Adrian Alberto Gutierrez Leal

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($course_id,Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Idea';
        $data['lessons'] = Lesson::where('course_id', '=', $course_id)->get();
        $data['course'] = $data['lessons'][0]->course;
        return view('lesson.show')->with('data', $data);
    }

    public function showFullLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $data['title'] = $lesson->getTitle();
        $data['lesson'] = $lesson;

        return view('lesson.showFullLesson')->with('data', $data);
    }
}
