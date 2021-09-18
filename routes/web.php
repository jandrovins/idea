<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes for courses
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

Route::post('/courses/save', [CourseController::class, 'save'])->name('courses.save');