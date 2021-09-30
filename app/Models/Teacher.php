<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'Teacher_name',
        'stream',
    ];
    function getStream()
    {
        return $this->hasMany('App\Models\Student');
    }
}
