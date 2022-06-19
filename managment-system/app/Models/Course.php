<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','year_of_course','fee'];

    public $timestamps = true;


    public function users(){
        return $this->hasMany(User::class,'course_id','id')->orderBy('first_name','ASC');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class,'subject_courses')->withTimestamps();
    }

}
