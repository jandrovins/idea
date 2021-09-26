<?php

//Author: Adrian Alberto Gutierrez Leal

namespace App\Http\Controllers\userspace;
use App\Http\Controllers\Controller;

use App\Models\Lesson;
use PDF;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $data['title'] = $lesson->getTitle();
        $data['lesson'] = $lesson;

        return view('lesson.show')->with('data', $data);
    }

    public function createPDF($id)
    {
        //retrieve same data as show
        $data['lesson'] = Lesson::findOrFail($id);
        // share data to view
        view()->share('data', $data);
        $pdf = PDF::loadView('lesson.showpdf', $data);

        // download PDF file with download method
        return $pdf->download('lesson.pdf');
    }
}
