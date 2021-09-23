<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function list()
    {
        $userCourses = Auth::user()->inscriptions->map(function ($inscription) {
            return $inscription->getCourseId();
        });

        $courses = Course::with('lessons')->whereNotIn('id', $userCourses)->paginate(10);

        $data = [
            'title' => 'List of all courses',
            'courses' => $courses,
        ];

        return view('courses.list')->with('data', $data);
    }

    public function listAll()
    {
        $data = [
            'title' => 'List of all courses',
            'courses' => Course::with('lessons')->paginate(10),
        ];

        return view('courses.list')->with('data', $data);
    }

    public function listOwn()
    {
        $userCourses = Auth::user()->inscriptions->map(function ($inscription) {
            return $inscription->getCourseId();
        });

        $courses = Course::with('lessons')->whereIn('id', $userCourses)->paginate(10);

        $data = [
            'title' => 'List of all courses',
            'courses' => $courses,
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
