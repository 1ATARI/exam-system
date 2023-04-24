<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getImagePathAttribute()
    {
        return asset('uploads/' . $this->image);

    }


    public function answers()
    {
        return $this->hasMany(UserAnswers::class , 'user_id');

    }

    public function results()
    {
        return $this->hasMany(ExamResult::class ,'user_id');
    }

    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class ,'user_id');
    }
    public function sessions()
    {
        return $this->hasMany(ExamSession::class ,'user_id');
    }

    //roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRole($roles)
    {

        $roles = is_array($roles) ? $roles : [$roles];

        return $this->roles()->whereIn('name', $roles)->exists();

    }

    public function hasRole($role)
    {

        return $this->roles()->where('name', $role)->exists();
    }

    public function firstRole()
    {
            return $this->roles()->first();

    }

}
