<?php

namespace App\Http\Controllers\userspace;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = __('messages.home.welcome');
        $answer = Http::get('http://fragance-store-teis.ga/public/api/fragances');
        $data['parfum'] = $answer->json();
        $courses = Course::has('reviews')->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc')->take(3)->get();
        $data['courses'] = $courses;
        return view('home.index')->with('data', $data);
    }
}
