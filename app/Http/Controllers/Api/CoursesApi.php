<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CoursesApi extends Controller
{
    public function listCourses()
    {
        return CourseResource::collection(Course::all());
    }
}
