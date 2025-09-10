<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    protected $fillable=[
        'title',
        'description',
        'organization',
        'location',
        'start_date',
        'end_date'];

        public function user(){
            return $this->belongsTo(User::class);
        }
}
