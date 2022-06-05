<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id','date_start_exam','date_end_exam'];

    protected $table = 'exams';
    public $timestamps = true;

    public function subjects(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'user_has_exams')->withTimestamps();
    }

}
