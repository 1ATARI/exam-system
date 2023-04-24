<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $courses_count = Course::count();
        $exams_count = Exam::count();
        $users_count = User::count();
        $questions_count = Question::count();
        $examined_students = ExamResult::distinct('user_id')->count();
        $examined_exams = ExamResult::distinct('exam_id')->count();

        $today_exams = ExamResult::whereDate('created_at', Carbon::today())->with(['exam' ,'user'])->latest()->get();

        $examResults = ExamResult::select(DB::raw("DATE_FORMAT(created_at, '%m') as month, COUNT(*) as count"))
            ->groupBy('month')
            ->orderBy('month')
            ->whereYear('created_at', date('Y'))
            ->get();

        $labels = [];
        $data = [];

        $allMonths = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        foreach ($allMonths as $month) {
            $monthNumber = DateTime::createFromFormat('!F', $month)->format('m');

            $count = $examResults->where('month', $monthNumber)->first();

            if ($count) {
                $data[] = $count->count;
            } else {
                $data[] = 0;
            }

            $labels[] = $month;
        }

        return view('admin.dashboard', compact('courses_count', 'exams_count', 'users_count', 'questions_count', 'examined_students', 'examined_exams' ,'today_exams',
        'data','labels'));

    }
}
