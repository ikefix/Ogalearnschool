<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['course_id', 'title', 'description', 'activity_date'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

