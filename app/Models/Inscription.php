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
        return $this->attributes['userId'];
    }

    public function setUserId($userId)
    {
        $this->attributes['userId'] = $userId;
    }

    public function getCourseId()
    {
        return $this->attributes['courseId'];
    }

    public function setCourseId($courseId)
    {
        $this->attributes['courseId'] = $courseId;
    }

    public function getProgress()
    {
        return $this->attributes['progress'];
    }

    public function setProgress($progress)
    {
        $this->attributes['progress'] = $progress;
    }
}
