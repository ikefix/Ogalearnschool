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



    // Relationships
    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    public function liveClasses()
{
    return $this->hasMany(LiveClass::class);
}

public function assets()
{
    return $this->hasMany(CourseAsset::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

    
}

