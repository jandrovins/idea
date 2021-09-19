<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/index', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Lesson Routes

Route::get('/lesson/show/{cId}', 'App\Http\Controllers\LessonController@show')->name('lesson.show');
Route::get('/lesson/showFullLesson{id}', 'App\Http\Controllers\LessonController@showFullLesson')->name('lesson.showFullLesson');

//Lesson Admin Routes

Route::get('admin/lesson/show/', 'App\Http\Controllers\LessonAdminController@show')->name('admin.lesson.show');
Route::get('admin/lesson/manage/{cId}', 'App\Http\Controllers\LessonAdminController@manage')->name('admin.lesson.manage');
Route::get('admin/lesson/create/{cId}', 'App\Http\Controllers\LessonAdminController@create')->name('admin.lesson.create');
Route::post('admin/lesson/save/', 'App\Http\Controllers\LessonAdminController@save')->name('admin.lesson.save');
Route::post('admin/lesson/remove/{id}', 'App\Http\Controllers\LessonAdminController@remove')->name('admin.lesson.remove');
Route::get('admin/lesson/edit/{id}', 'App\Http\Controllers\LessonAdminController@edit')->name('admin.lesson.edit');
Route::post('admin/lesson/update/{id}', 'App\Http\Controllers\LessonAdminController@update')->name('admin.lesson.update');

// Routes for courses
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

Route::post('/courses/save', [CourseController::class, 'save'])->name('courses.save');
