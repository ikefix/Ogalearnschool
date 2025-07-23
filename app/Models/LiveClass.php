<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'school_id',
        'meeting_name',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }
}
