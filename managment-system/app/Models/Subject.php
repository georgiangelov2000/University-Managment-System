<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    protected $table = 'subjects';
    public $timestamps = true;

    public function courses()
    {
        return $this->belongsToMany(Course::class,'subject_courses')->withPivot('course_id')->withTimestamps();
    }

}
