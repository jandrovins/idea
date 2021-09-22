<?php

use App\Http\Controllers\CourseAdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonAdminController;
use App\Http\Controllers\LessonController;
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

// Home Routes
Route::get('/index', [HomeController::class, 'index'])->name('home.index');
Route::redirect('/', '/index', 301);

// Course User Routes
Route::get('/courses/list', [CourseController::class, 'list'])->name('courses.list');
Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show');

//Lesson User Routes
Route::get('/lesson/list/{cId}', [LessonController::class, 'list'])->name('lesson.list');
Route::get('/lesson/show/{id}', [LessonController::class, 'show'])->name('lesson.show');

// Admin routes, CRUD
Route::prefix('admin')->group(function () {
    // Courses
    Route::get('/courses/create', [CourseAdminController::class, 'create'])->name('admin.courses.create');
    Route::get('/courses/list', [CourseAdminController::class, 'list'])->name('admin.courses.list');
    Route::post('/courses/save', [CourseAdminController::class, 'save'])->name('admin.courses.save');
    Route::get('/courses/edit/{id}', [CourseAdminController::class, 'edit'])->name('admin.courses.edit');
    Route::post('/courses/update/{id}', [CourseAdminController::class, 'update'])->name('admin.courses.update');
    Route::post('/courses/delete/{id}', [CourseAdminController::class, 'delete'])->name('admin.courses.delete');

    // Lesson
    Route::get('/lesson/show/', [LessonAdminController::class, 'show'])->name('admin.lesson.show');
    Route::get('/lesson/manage/{cId}', [LessonAdminController::class, 'manage'])->name('admin.lesson.manage');
    Route::get('/lesson/create/{cId}', [LessonAdminController::class, 'create'])->name('admin.lesson.create');
    Route::post('/lesson/save/', [LessonAdminController::class, 'save'])->name('admin.lesson.save');
    Route::post('/lesson/remove/{id}', [LessonAdminController::class, 'remove'])->name('admin.lesson.remove');
    Route::get('/lesson/edit/{id}', [LessonAdminController::class, 'edit'])->name('admin.lesson.edit');
    Route::post('/lesson/update/{id}', [LessonAdminController::class, 'update'])->name('admin.lesson.update');
});
