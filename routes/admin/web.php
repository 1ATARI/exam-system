<?php

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [DashboardController::class , 'index'])->name('dashboard');
Route::resource('/users' , \App\Http\Controllers\Admin\UserController::class );
Route::resource('/courses', CourseController::class);
Route::resource('/exams', ExamController::class)->except('show');
Route::resource('exams.questions', QuestionController::class);
