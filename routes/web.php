<?php

// Authors: Simón Flórez, Adrián Gutiérrez, Vincent A. Arcila
// Last edition: September 21, 2021

use App\Http\Controllers\CourseAdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LessonAdminController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReviewController;
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

Auth::routes();

// Home Routes
Route::get('/index', [HomeController::class, 'index'])->name('home.index');
Route::redirect('/', '/index', 301);
Route::redirect('/home', '/index', 301);

// Auth needed routes
Route::middleware('auth')->group(function () {
    // Course User Routes
    Route::get('/courses/list', [CourseController::class, 'list'])->name('courses.list');  // List courses the logged user is not enrolled in
    Route::get('/courses/listTop', [CourseController::class, 'listTop'])->name('courses.listTop');
    Route::get('/courses/listAll', [CourseController::class, 'listAll'])->name('courses.listAll');  // List all courses
    Route::get('/courses/listOwn', [CourseController::class, 'listOwn'])->name('courses.listOwn');  // List courses the logged user is enrolled in
    Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show');

    // Course Inscription routes
    Route::post('/course/inscription/enroll', [InscriptionController::class, 'enroll'])->name('inscription.enroll');
    Route::post('/course/inscription/leave', [InscriptionController::class, 'leave'])->name('inscription.leave');

    // Review User Routes
    Route::post('/course/review/save', [ReviewController::class, 'save'])->name('review.save');

    //Lesson User Routes
    Route::get('/lesson/show/{id}', [LessonController::class, 'show'])->name('lesson.show');
    Route::get('/lesson/createPDF/{id}', [LessonController::class, 'createPDF'])->name('lesson.createPDF');
});

// Admin routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/index', [HomeAdminController::class, 'index'])->name('admin.home.index');

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
