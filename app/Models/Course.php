<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'image',
        'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function name(): Attribute
    {
        return Attribute::make(

            set:fn(string $value)=>ucfirst($value)
        );
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/' . $this->image);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationships
    public function exams()
    {
        return $this->hasMany(Exam::class);

    }
    public function scopeHasExams($query)
    {
        return $query->whereHas('exams', function ($query) {
            $query->whereHas('sessions');
        });
    }


}
