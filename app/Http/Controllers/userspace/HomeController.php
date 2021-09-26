<?php

namespace App\Http\Controllers\userspace;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = ['title' => __('messages.home.welcome')];

        return view('home.index')->with('data', $data);
    }

    public function home()
    {
        return redirect()->route('home.index');
    }
}
