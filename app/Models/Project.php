<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function task() {
        return $this->belongsToMany(Task::class);
    }
}
