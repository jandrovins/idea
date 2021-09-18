<?php

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

//Lesson Routes

Route::get('/lesson/show/', 'App\Http\Controllers\LessonController@show')->name('lesson.show');
Route::get('/lesson/manage/', 'App\Http\Controllers\LessonController@manage')->name('lesson.manage');
Route::get('/lesson/create/{cId}', 'App\Http\Controllers\LessonController@create')->name('lesson.create');
Route::post('/lesson/save/', 'App\Http\Controllers\LessonController@save')->name('lesson.save');
Route::post('/lesson/remove/{id}', 'App\Http\Controllers\LessonController@remove')->name('lesson.remove');
Route::post('/lesson/edit/{id}', 'App\Http\Controllers\LessonController@edit')->name('lesson.edit');
Route::get('/lesson/showFullLesson{id}', 'App\Http\Controllers\LessonController@showFullLesson')->name('lesson.showFullLesson');

//Lesson Admin Routes

Route::get('admin/lesson/show/', 'App\Http\Controllers\LessonAdminController@show')->name('admin.lesson.show');
