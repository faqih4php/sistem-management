<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function task() {
        return $this->belongsToMany(Task::class);
    }
}
