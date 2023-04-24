<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSession extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'exam_id',

        'start_time',
        'end_time',

    ];

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }


}
