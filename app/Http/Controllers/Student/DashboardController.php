<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $exam_count = ExamResult::where('user_id', Auth::id())->count();
        $avg_resultMonth = number_format(Auth::user()->results()->avg('percentage'), 1);
        $course_count = Course::count();


        $examsByMonth = ExamResult::select(DB::raw('COALESCE(AVG(percentage), 0) as avg_percentage, DATE_FORMAT(created_at, "%M") as month'))
            ->where('user_id', Auth::id())
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $allMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $monthsData = [];

        foreach ($allMonths as $month) {
            $monthData = $examsByMonth->where('month', $month)->first();
            $monthsData[] = $monthData ? $monthData->avg_percentage : 0;
        }

        $labels = $allMonths;
        $data = $monthsData;

        $results = auth()->user()->results();
        $avg_results = number_format($results->avg('percentage'), 1);

        return view('student.dashboard', compact('exam_count', 'labels', 'data', 'avg_results', 'avg_resultMonth', 'course_count'));
    }
}
