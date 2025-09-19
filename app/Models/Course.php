<?php

namespace App\Models;
use App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ["title"];

    // Relationship: one course has many students (many-to-many)
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
