<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ExamAttemptController extends Controller
{
    public function startAttempt(Request $request)
    {
        $course_exam_id = $request->input('course_exam_id');
        $user_id = Auth::id();
        $start_time = now();

        // Check if user has already started attempt for this exam
        $existing_attempt = ExamAttempt::where('user_id', $user_id)
            ->where('exam_id', $course_exam_id)
            ->whereNull('end_time')
            ->first();
        if ($existing_attempt) {
            return redirect()->back()->with('error', 'You have already started this attempt.');
        }

        // Get exam duration from CourseExam model
        $exam_duration = Exam::find($course_exam_id)->duration;

        // Create new exam attempt in database
        $attempt = new ExamAttempt;
        $attempt->user_id = $user_id;
        $attempt->exam_id = $course_exam_id;
        $attempt->start_time = $start_time;
        $attempt->end_time = null;
        $attempt->save();

        // Store exam attempt data in session
        Session::put('exam_attempt_id', $attempt->exam_attempt_id);
        Session::put('exam_duration', $exam_duration);
        Session::put('exam_start_time', $start_time);

        return redirect()->route('admin.exams.questionsart');
    }

    public function endAttempt(Request $request)
    {
        $exam_attempt_id = Session::get('exam_attempt_id');
        $user_id = Auth::id();
        $end_time = now();

        // Check if end time is after exam duration has elapsed
        $exam_start_time = Session::get('exam_start_time');
        $exam_duration = Session::get('exam_duration');
        $time_elapsed = $end_time->diffInMinutes($exam_start_time);
        if ($time_elapsed > $exam_duration) {
            $time_remaining = 0;
        } else {
            $time_remaining = $exam_duration - $time_elapsed;
        }

        // Update exam attempt in database with end time and time remaining
        ExamAttempt::where('exam_attempt_id', $exam_attempt_id)
            ->where('user_id', $user_id)
            ->update([
                'end_time' => $end_time,
                'time_remaining' => $time_remaining
            ]);

        // Clear exam attempt data from session
        Session::forget('exam_attempt_id');
        Session::forget('exam_duration');
        Session::forget('exam_start_time');

        return redirect()->route('exam.result', ['exam_attempt_id' => $exam_attempt_id]);
    }
}
