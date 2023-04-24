<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['exams' , 'user'])->get();
        return view('front.courses.index' , compact('courses'));
    }

    public function show($course)
    {
        $course=Course::where('name',$course)->with('exams.questions')->firstOrFail();
        return view('front.courses.show' , compact('course'));
    }


}
