<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    //
    protected $fillable = ['user_id', 'course_id', 'progress'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getCourseId()
    {
        return $this->attributes['course_id'];
    }

    public function setCourseId($courseId)
    {
        $this->attributes['course_id'] = $courseId;
    }

    public function getProgress()
    {
        return $this->attributes['progress'];
    }

    public function setProgress($progress)
    {
        $this->attributes['progress'] = $progress;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
