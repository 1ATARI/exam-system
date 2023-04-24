<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\course;
use App\Models\Exam;
use App\Models\User;
use App\Services\admin\CourseServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $courses = Course::when($request->search , function ($courses) use ($request){
            return $courses->where('name' , 'like' , '%' . $request->search . '%');
        })->with('exams')->latest()->paginate(15);
        return view('admin.courses.index' ,compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.courses.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {

        (new CourseServices())->store($request);

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {

        $examsByMonth =
            Exam::select(DB::raw('COUNT(*) as exams_count, MONTH(created_at) as month'))
            ->where('course_id', $course->id)
            ->groupBy('month')->whereYear('created_at', date('Y'))
            ->get();

        $data = [];
        $labels = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        foreach ($labels as $key => $label) {
            $data[$key] = 0;
            foreach ($examsByMonth as $exams) {
                if ($exams->month == $key + 1) {
                    $data[$key] = $exams->exams_count;
                    break;
                }
            }
        }

        return view('admin.courses.show' , compact('course'  ,'labels' ,'data') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course)
    {
        $users = User::whereHas('roles' , function ($query){
           $query->where('name' , 'Doctor');
        })->get();
        return view('admin.courses.edit' , compact('course' ,'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, course $course)
    {
        (new CourseServices())->update($request , $course);
        return redirect()->route('admin.courses.index' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        (new CourseServices())->destroy($course);
        return redirect()->route('admin.courses.index');


    }
}
