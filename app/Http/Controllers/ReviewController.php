<?php

// Author: Vincent A. Arcila
// Date: September 22, 2021

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function save(Request $request)
    {
        Review::validate($request);
        Review::create($request->only(['rating', 'comment', 'user_id', 'course_id']));

        return back()->with('success', __('messages.course.createReview.success'));
    }
}
