<?php
//Author: Adrian Alberto Gutierrez Leal

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Lesson extends Model
{
    //attributes id, title, body, course_id, created_at, updated_at
    protected $fillable = ['title', 'body', 'course_id'];

    public static function validate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'course_id' => 'required',
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getBody()
    {
        return $this->attributes['body'];
    }

    public function setBody($body)
    {
        $this->attributes['body'] = $body;
    }

    public function getCourseId()
    {
        return $this->attributes['course_id'];
    }

    public function setCourseId($course_id)
    {
        $this->attributes['course_id'] = $course_id;
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
