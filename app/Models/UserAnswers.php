<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'question_id',
        'user_answer',

    ];

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function quesiotn()
    {
        return $this->belongsTo(Question::class ,'question_id');

    }
}
