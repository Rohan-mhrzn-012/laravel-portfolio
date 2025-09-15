<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'user_id',
        'author_id',
        'title',
        'content',
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }
    
    public function user(){
        return $this->belongsTo(user::class);
    }
}
