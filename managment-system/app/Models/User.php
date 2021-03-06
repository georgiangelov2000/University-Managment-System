<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'picture',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'course_id',
        'age',
        'gender',
        'country',
        'exam_is_taken'
    ];

    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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

    public $timestamps = true;

    public function courses(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function exams(){
        return $this->belongsToMany(Exam::class,'user_has_exams')->withTimestamps();
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class,'marks')->withPivot('mark');
    }


}
