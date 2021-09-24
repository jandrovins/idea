<?php

// Authors: Simón Flórez, Vincent A. Arcila
// Last edition: September 24, 2021

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function list()
    {
        $data = [
            'title' => 'List of all courses',
            'courses' => Course::with('lessons')->paginate(10),
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

    public function listTop()
    {
        // Select courses that have one or more reviews ; calculate their rating avg ; sort them by rating avg ; take top 3
        $courses = Course::has('reviews')->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc')->take(3)->get();

        $data = [
            'title' => 'Our top rated courses',
            'courses' => $courses,
        ];

        return view('courses.listTop')->with('data', $data);
    }
}
