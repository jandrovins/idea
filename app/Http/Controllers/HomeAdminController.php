<?php

namespace App\Http\Controllers;

class HomeAdminController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Admin Dashboard'];
        return view('admin.home.index')->with('data', $data);
    }
}
