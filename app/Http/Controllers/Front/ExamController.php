<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ResultMail;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\UserAnswers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExamController extends Controller
{

    public function confirm(Exam $exam)
    {
        $session = ExamSession::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->where('end_time', '>', now())
            ->first();

        $passed = ExamSession::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->first();


        return view('front.exam.confirm', compact('exam' , 'session' ,'passed'));
    }


    public function startExam(Request $request, Exam $exam)
    {
        $session = ExamSession::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->first();
        if ($session) {
            return redirect()->route('exams.confirm', ['exam' => $exam])->with('error', 'You have already started this exam.');
        }

        $session = new ExamSession();
        $session->user_id = Auth::id();
        $session->exam_id = $exam->id;
        $session->start_time = now();
        $session->end_time = now()->addMinutes($exam->duration);
        $session->save();

        $questions = $exam->questions()->inRandomOrder()->get();
        $request->session()->put('questions', $questions);

        return redirect()->route('exams.questions', ['id' => $exam->id]);


    }


    public function showQuestion(Request $request, $id)
    {
        // Get the logged in user
        $user = Auth::user();

        // Get the exam details
        $exam = Exam::findOrFail($id);

        // Get the questions from the session
        $questions = $request->session()->get('questions');

        // Check if the user has started the exam and the session is still valid
        $session = ExamSession::where('user_id', $user->id)
            ->where('exam_id', $exam->id)
            ->where('end_time', '>', now())
            ->first();

        if (!$session) {
            return redirect()->route('exams.confirm', $exam)->with('error', 'You are not authorized to access this exam or your session has expired.');
        }




        return view('front.exam.questions', compact('exam', 'questions', 'session'));
    }

    public function submitAnswer(Request $request, $exam, $session)
    {
        $exam=Exam::findOrFail($exam);

        $validatedData = $request->validate([
            'session' => 'required',
            'answer' => 'array',
            'answer.*' => 'string|in:option_a,option_b,option_c,option_d',
        ]);
        $validatedData['answer'] =$validatedData['answer']??[];


        $user = Auth::user();

        foreach ($validatedData['answer'] as $questionId => $userAnswer) {

             Question::findOrFail($questionId);



            UserAnswers::updateOrCreate(
                ['user_id' => $user->id, 'question_id' => $questionId],
                ['user_answer' => $userAnswer]
            );
        }


        return redirect()->route('exams.results', $exam);

    }

    public function showResult(Request $request, $exam_id)
    {
        $user = Auth::user();

        $exam = Exam::with('course')->find($exam_id);

        $session = ExamSession::where('user_id', $user->id)
            ->where('exam_id', $exam->id)
            ->first();

        // If the user has not attempted the exam, redirect them to the exam page
        if (!$session) {
            return redirect()->route('exams.confirm', $exam->id)
                ->with('error', 'You have not attempted this exam.');
        }

        // Get the questions for the exam
        $questions = Question::where('exam_id', $exam->id)->get();

        // Get the user's answers for the exam
        $userAnswers = UserAnswers::where('user_id', $user->id)
            ->whereIn('question_id', $questions->pluck('id'))
            ->get();

        // Calculate the user's score
        $score = 0;
        foreach ($userAnswers as $userAnswer) {
            $question = $questions->where('id', $userAnswer->question_id)->first();
            if ($userAnswer->user_answer == $question->correct_answer) {
                $score++;
            }
        }
        if (count($questions)>0){
        $percentage = round($score / count($questions) * 100, 2);
        }else{
            $percentage=0;
        }

        ExamResult::firstOrCreate([
            'user_id' => $user->id,
            'exam_id' => $exam->id,
            'score' => $score .'-' .count($questions),
            'percentage'=>$percentage,
        ]);


        if (!$session->result_sent) {
            $session->end_time = Carbon::now();
            $session->save();

            Mail::to($user->email)->send(new ResultMail($score , $user ,$percentage , $exam));
            $session->result_sent = true;
            $session->save();
        }


        return view('front.exam.result', compact('exam', 'score', 'percentage'));
    }


}
