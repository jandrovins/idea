<?php

// Authors: Simón Flórez, Vincent A. Arcila
// Last edition: September 24, 2021

namespace App\Http\Controllers\userspace;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Inscription;
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
            'title' => __('messages.course.list.available'),
            'courses' => $courses,
        ];

        return view('courses.list')->with('data', $data);
    }

    public function listAll()
    {
        $data = [
            'title' => __('messages.course.list.all'),
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
            'title' => __('messages.course.list.own'),
            'courses' => $courses,
        ];

        return view('courses.list')->with('data', $data);
    }

    public function show($id)
    {
        $userId = Auth::user()->getId();
        $course = Course::with(['lessons', 'author', 'reviews.user'])->findOrFail($id);
        $courseId = $course->getId();

        $data = [
            'title' => $course->getTitle(),
            'course' => $course,
            'isEnrolled' => Inscription::where([
                ['user_id', '=', $userId], ['course_id', '=', $courseId],
            ])->exists(),
        ];

        return view('courses.show')->with('data', $data);
    }

    public function listTop()
    {
        // Select courses that have one or more reviews ; calculate their rating avg ; sort them by rating avg ; take top 3
        $courses = Course::has('reviews')->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc')->take(3)->get();

        $data = [
            'title' => __('messages.course.listTop'),
            'courses' => $courses,
        ];

        return view('courses.listTop')->with('data', $data);
    }
}
