<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable =[
      'user_id',
        'exam_id',
        'score',
        'percentage'


    ];
    protected $appends=['questions','result'];

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class ,'exam_id');
    }
    public function getQuestionsAttribute()
    {
        $arr =explode("-", $this->score);
        return $arr[1];
    }
    public function getResultAttribute()
    {
        $arr =explode("-", $this->score);
        return $arr[0];
    }

}
