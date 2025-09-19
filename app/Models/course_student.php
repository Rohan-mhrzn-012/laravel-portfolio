<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course_student extends Model
{
   protected $fillable = ['student_id', 'course_id'];
}
