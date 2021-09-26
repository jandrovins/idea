<?php

// Author: Vincent A. Arcila

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Review extends Model
{
    //attributes id, rating, comment, created_at, updated_at, user_id, course_id
    protected $fillable = ['rating', 'comment', 'user_id', 'course_id'];

    public static function validate(Request $request)
    {
        $request->validate(
            [
            'rating' => ['required', 'numeric', 'gte:0', 'lte:10'],
            'comment' => ['required', 'string', 'min:1', 'max:500'],
            'user_id'=> ['required'],
            'course_id'=> ['required'],
            ]
        );
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
    }

    public function getComment()
    {
        return $this->attributes['comment'];
    }

    public function setComment($comment)
    {
        $this->attributes['comment'] = $comment;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getCourseId()
    {
        return $this->attributes['course_id'];
    }

    public function setCourseId($course_id)
    {
        $this->attributes['course_id'] = $course_id;
    }
}
