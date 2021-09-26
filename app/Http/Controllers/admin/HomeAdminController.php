<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class HomeAdminController extends Controller
{
    public function index()
    {
        $data = ['title' => __('messages.admin.index.title')];

        return view('admin.home.index')->with('data', $data);
    }
}
