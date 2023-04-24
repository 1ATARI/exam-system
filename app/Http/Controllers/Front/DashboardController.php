<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles' , function ($query){
            $query->where('name' , 'Doctor');
        })->limit(4)->get();
        $courses = Course::with(['exams' ,'user'])->limit(3)->get();
        return view('front.dashboard',compact('courses' ,'users'));
    }
}
