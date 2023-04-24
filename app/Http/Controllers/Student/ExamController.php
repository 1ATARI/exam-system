<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\ExamSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index(Request $request)
    {


        $results = ExamResult::with(['user', 'exam.course'])
            ->where('user_id', Auth::id())
            ->when($request->search, function ($query) use ($request) {
                return $query->whereHas('exam', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->course , function ($query) use ($request){
                return $query->whereHas('exam', function ($query) use ($request){
                    $query->where('course_id',  $request->course );
                });
            })
            ->paginate(15);


        $courses = Course::hasExams()->get();

        return view('student.exams.index' , compact('courses' , 'results'));
    }

    public function show(Exam $exam)
    {

        $this->authorize('view', $exam);
//        $percentage = $exam->results()->avg('percentage');
//        dd($exam->results()->first()->percentage->percentage);
        return view('student.exams.show', compact('exam'));


    }

}
