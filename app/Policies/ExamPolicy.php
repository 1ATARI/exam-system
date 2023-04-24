<?php

namespace App\Policies;

use App\Models\ExamResult;
use Illuminate\Auth\Access\Response;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExamPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Exam $exam): bool
    {
        $result = ExamResult::where('user_id', $user->id)->exists();
        if ($result) {
            $exam->load(['questions.userAnswer' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }]);
            return true;
        }
        return false;
    }


}
