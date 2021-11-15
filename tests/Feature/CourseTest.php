<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;

class CourseTest extends TestCase
{
    /**
     * Tests whether when creating Courses each
     * automatizally generates a custom image.
     *
     * @return void
     */
    public function testImagesInCourses()
    {
        $courses = Course::factory()->count(10)->make();
        foreach($courses as $course){
            $this->assertTrue($course->getImage() != '/img/missing.jpeg');
        }
    }
}
