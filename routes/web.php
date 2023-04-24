<?php

use App\Http\Controllers\Front\CourseController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {

    if (auth()->user()->hasRole('Doctor')){
        return redirect()->route('admin.dashboard');
    }else{
        return redirect()->route('student.dashboard');

    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/', [DashboardController::class ,'index'])->name('index');

Route::group(['as' => 'courses'], function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('.index');
    Route::get('/courses/{name}', [CourseController::class, 'show'])->name('.show');


});
Route::view('/about' , 'front.about')->name('about');

Route::view('test1', 'mails.exam');
require __DIR__ . '/auth.php';
