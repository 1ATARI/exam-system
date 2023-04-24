<?php

namespace App\Services\admin;

use Flasher\Laravel\Facade\Flasher;

class QuestionsServices
{
        public $questions;

    public function index($request,$exam )
    {
        $this->questions = $exam->questions()->when($request->search, function ($exams) use ($request) {
            return $exams->where('name', 'like', '%' . $request->search . '%');
        })->when($request->course, function ($exams) use ($request) {
            return $exams->where('course_id', $request->course);
        })->paginate(15);

    }

    public function store($request , $exam)
    {
        $exam->questions()->create($request);
        Flasher::addSuccess('Question created successfully.');

    }

    public function update($request , $question)
    {

        $question->update($request);
        Flasher::addSuccess($question->name . ' Question updated successfully.');

    }

    public function destroy($question)
    {
        $question->delete();
        Flasher::addSuccess($question->name . ' Question deleted successfully.');

    }

}
