<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'duration',

    ];




    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function results()
    {
        return $this->hasOne(ExamResult::class, 'exam_id');
    }

    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class, 'exam_id');
    }

    public function sessions()
    {
        return $this->hasMany(ExamSession::class, 'exam_id');
    }

    public function hasUser($query)
    {
        return $query->whereHas('questions.userAnswer' , function ($query){
            $query->where('user_id' , Auth::id());
        });
    }


}
