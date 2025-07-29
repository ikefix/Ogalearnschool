<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'author_id',
        'title',
        'slug',
        'what_youll_learn',
        'course_outcomes',
        'course_questions',
        'description',
        'thumbnail',
        'content',
        'views',
        'likes',
        'status',
    ];

    /**
     * Get the school that owns the course.
     */
    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    /**
     * Users who have access to this course (general many-to-many if used elsewhere).
     */
    public function students()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Users who have subscribed (paid) to this course.
     */
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'course_id', 'user_id')->withTimestamps();
    }

    /**
     * Author (usually a school/staff).
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Lessons or course contents.
     */
    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    /**
     * Live classes under this course.
     */
    public function liveClasses()
    {
        return $this->hasMany(LiveClass::class);
    }

    /**
     * Assets like videos, PDFs, etc.
     */
    public function assets()
    {
        return $this->hasMany(CourseAsset::class);
    }

    /**
     * Comments or reviews related to the course.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Check if a user is subscribed to the course.
     */
    public function isUserSubscribed($userId)
    {
        return $this->subscribers()->where('user_id', $userId)->exists();
    }
}
