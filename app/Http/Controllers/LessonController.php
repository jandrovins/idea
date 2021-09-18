<?php

//Author: Adrian Alberto Gutierrez Leal

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
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

        return view('lesson.show')->with('data', $data);
    }

    public function manage(Request $request)
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

        return view('lesson.manage')->with('data', $data);
    }

    public function showFullLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $data['title'] = $lesson->getTitle();
        $data['lesson'] = $lesson;

        return view('lesson.showFullLesson')->with('data', $data);
    }

    public function remove($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect()->back()->with('status', 'Lesson Deleted Successfully');
    }

    //FILL
    public function edit($id)
    {
        /*
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect()->back()->with('status', 'Lesson Deleted Successfully');
        */
    }

    //course Id, when function is directly called from CourseController
    public function create($course_id)
    {
        $data = []; //to be sent to the view
        $data['title'] = 'Create Lesson';
        /*
        Course Model doesn't exist yet
        $course = Course::findOrFail($course_id)
        */
        $data['course'] = $course_id; //$course->getId()

        return view('lesson.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Lesson::validate($request);
        Lesson::create($request->only(['title', 'body', 'course_id']));

        return redirect()->back()->with('success', 'New Lesson added succesfully!!!');
    }
}
