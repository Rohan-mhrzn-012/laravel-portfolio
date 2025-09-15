<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function userRelation()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}