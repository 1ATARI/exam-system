<?php

namespace App\Services\admin;

use App\Models\Course;
use App\Models\Exam;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;

class ExamServices
{
    public $courses;
    public $exams;

    public function index($request)
    {

        $this->courses = Course::all();
        $this->exams = Exam::when($request->search, function ($exams) use ($request) {
            return $exams->where('name', 'like', '%' . $request->search . '%');
        })->when($request->course, function ($exams) use ($request) {
            return $exams->where('course_id', $request->course);
        })->with(['course' , 'questions'])->paginate(15);

    }


    public function store($request)
    {
        Flasher::addSuccess('Exam created successfully.');

        $this->exams = Exam::create($request);

    }

    public function update($request, $exam)
    {
        Flasher::addSuccess($exam->name .' exam updated successfully.');

        return $exam->create($request);
    }

    public function destroy($exam)
    {
        Flasher::addSuccess($exam->name . ' exam deleted successfully.');
        return $exam->delete();
    }

}
