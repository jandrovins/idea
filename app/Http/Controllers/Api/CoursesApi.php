<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CoursesApi extends Controller
{
    public function listCourses()
    {
        return new CourseCollection(CourseResource::collection(Course::all()));
    }

    public function randomCourse()
    {
        return new CourseCollection(CourseResource::collection(Course::all()->random()));
    }

    public function listCoursesPaginate()
    {
        return new CourseCollection(CourseResource::collection(Course::paginate(10)));
    }
}
