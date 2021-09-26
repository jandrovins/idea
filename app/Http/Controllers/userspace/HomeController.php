<?php

namespace App\Http\Controllers\userspace;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function home()
    {
        return redirect()->route('home.index');
    }
}
