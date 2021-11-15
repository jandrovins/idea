<?php

namespace App\Http\Controllers\userspace;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $data = ['title' => __('messages.home.welcome')];
        $answer = Http::get('http://fragance-store-teis.ga/public/api/fragances');
        $data['parfum'] = $answer->json();
        return view('home.index')->with('data', $data);
    }
}
