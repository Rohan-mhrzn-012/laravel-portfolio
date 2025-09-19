<?php

namespace App\Models;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   use HasFactory;
   protected $fillable=["fullname", "age", 'phone', 'profile_picture'];

   public function course(){
    return $this->belongsToMany(Course::class);
   }
}