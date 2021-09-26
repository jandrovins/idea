<?php

//Author: Simón Flórez Silva

namespace App\Http\Controllers\userspace;

use App\Http\Controllers\Controller;
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

                return back()->with('success', __('messages.course.enroll.success'));
            } else {
                return back()->with('error', __('messages.course.enroll.failed', ['ID' => $courseId]));
            }
        } else {
            return back()->with('error', __('messages.course.enroll.noCourseId'));
        }
    }

    public function leave(Request $request)
    {
        if ($request->has('courseId')) {
            $courseId = $request->get('courseId');
            $userId = Auth::user()->getId();

            if (Course::where('id', '=', $courseId)->exists()) {
                Inscription::where([
                    ['user_id', '=', $userId],
                    ['course_id', '=', $courseId],
                ])->delete();

                return back()->with('success', __('messages.course.enroll.leave.success'));
            } else {
                return back()->with('error', __('messages.course.enroll.failed', ['ID' => $courseId]));
            }
        } else {
            return back()->with('error', __('messages.course.enroll.noCourseId'));
        }
    }
}
