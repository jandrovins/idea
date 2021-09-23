<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    public function enroll(Request $request)
    {
        if ($request->has('courseId')) {
            $courseId = $request->get('courseId');
            $userId = Auth::user()->getId();

            if (Course::where('id', '=', $courseId)->exists()) {
                Inscription::firstOrCreate([
                    'user_id' => $userId,
                    'course_id' => $courseId,
                ]);

                return back()->with('success', __('messages.course.list.enroll.success'));
            } else {
                return back()->with('error', __('messages.course.list.enroll.failed'));
            }
        }
    }
}
