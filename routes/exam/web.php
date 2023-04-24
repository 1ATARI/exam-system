<?php


use App\Http\Controllers\Front\ExamController;
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


//this is for exam logic in the front pages

//confirm to take the exam before start it
Route::get('/confirm-exam/{exam}', [ExamController::class, 'confirm'])->name('confirm');
//start the exam time and redirect it to the question page
Route::get('/{exam}', [ExamController::class, 'startExam'])->name('start');
// Get the questions and Check if the user has started the exam and the session is still valid
Route::get('/{id}/questions', [ExamController::class, 'showQuestion'])->name('questions');
// Saving data for the user and redirect to Result page
Route::post('/{exam}/submit/{session}', [ExamController::class, 'submitAnswer'])->name('submit');
//calculate the User Result and sending email with score and percentage
Route::get('/{exam}/results', [ExamController::class, 'showResult'])->name('results');
