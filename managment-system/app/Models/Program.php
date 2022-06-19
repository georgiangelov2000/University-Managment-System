<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';
    protected $fillable = [
        'course_id',
        'subject_id',
        'hour',
        'date',
    ];
    public $timestamps = false;
}
