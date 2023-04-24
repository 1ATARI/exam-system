<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Services\admin\ExamServices;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $index = new ExamServices();
        $index->index($request);
        $exams = $index->exams;
        $courses = $index->courses;

        return view('admin.exams.index', compact('exams' ,'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();

        return view('admin.exams.create' , compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        $store = new ExamServices();
        $store->store($request->validated());
        $exam = $store->exams;
//         (new ExamServices())->store($request->validated());
        return redirect()->route('admin.exams.questions.index',$exam);

    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        $courses = Course::all();
        return view('admin.exams.edit' , compact('exam' ,'courses'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        (new ExamServices())->update($request->validated() , $exam);
        return redirect()->route('admin.exams.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        (new ExamServices())->destroy($exam);
        return redirect()->route('admin.exams.index');


    }
}
