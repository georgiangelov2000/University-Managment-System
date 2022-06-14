<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'marks';
    protected $fillable = [
        'user_id',
        'subject_id',
        'mark',
        'date_of_mark',
    ];
    public $timestamps = false;

}
