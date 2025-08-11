<?php

// app/Models/CoursePayment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePayment extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'reference',
        'amount',
        'status',
    ];



    public function student()
{
    return $this->belongsTo(User::class, 'student_id');
}

public function course()
{
    return $this->belongsTo(Course::class);
}

}
