<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'exam_id',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
    ];

//
//    public function correctAnswer(): Attribute
//    {
//        return Attribute::make(
//
//            get:fn(string $value)=>ucfirst(str_replace("option_", "", $value))
//        );
//    }

    public function getCorrectAttribute()
    {
        return ucfirst(str_replace("option_", "", $this->correct_answer));
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function userAnswer()
    {
        return $this->hasOne(UserAnswers::class ,'question_id');

    }
}
