<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Exam;
use App\Models\Question;
use App\Services\admin\QuestionsServices;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request ,Exam $exam )
    {

        $index = new QuestionsServices();
        $index->index($request,$exam );
        $questions= $index->questions;



        return view('admin.question.index' , compact('questions','exam' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Exam $exam)
    {
        return view('admin.question.create' , compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request , Exam $exam)
    {
        (new QuestionsServices())->store($request->validated() , $exam);
        return redirect()->route('admin.exams.questions.index',$exam);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam , Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam ,Question $question)
    {
        return view('admin.question.edit' , compact('exam' , 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request,Exam $exam ,Question $question)
    {
        (new QuestionsServices())->update($request->validated() , $question);

        return redirect()->route('admin.exams.questions.index',$exam);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Exam $exam,Question $question)
    {
        (new QuestionsServices())->destroy($question);
        return redirect()->route('admin.exams.questions.index',$exam);


    }
}
