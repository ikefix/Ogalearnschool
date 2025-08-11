<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CoursePayment;
use App\Models\Course;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',         // school, student, admin, super admin
        'school_name',  // for schools only
        'address',      // for schools
        'phone_number', // for schools
        'gender',       // for students
        'school_id',    // for students (foreign key reference to school)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship: If this user is a student, get the school they belong to.
     */
    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    /**
     * Relationship: If this user is a school, get the students.
     */
    public function students()
    {
        return $this->hasMany(User::class, 'school_id')->where('role', 'student');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'school_id');
    }

//     public function subscribedCourses()
// {
//     return $this->belongsToMany(Course::class, 'subscriptions', 'user_id', 'course_id')->withTimestamps();
// }

public function subscribedCourses()
{
    return $this->belongsToMany(Course::class, 'course_payments', 'student_id', 'course_id')
        ->withTimestamps();
}






public function hasPaidForCourse($courseId)
{
    return CoursePayment::where('student_id', $this->id)
        ->where('course_id', $courseId)
        ->where('status', 'success')
        ->exists();
}




    public function liveClasses()
    {
        return $this->hasMany(LiveClass::class, 'school_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'student_id');
    }

//     public function subscriptions()
// {
//     return $this->belongsToMany(Course::class, 'subscriptions', 'user_id', 'course_id')->withTimestamps();
// }

    // public function hasActiveSubscription()
    // {
    //     return $this->subscription &&
    //            $this->subscription->ends_at->isFuture();
    // }

    // /**
    //  * Courses the student has enrolled in
    //  */
    // public function enrolledCourses()
    // {
    //     return $this->belongsToMany(Course::class, 'course_enrollments')->withTimestamps();
    // }



public function coursePayments()
{
    return $this->hasMany(CoursePayment::class, 'student_id');
}



}
