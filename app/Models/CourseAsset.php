<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAsset extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'pdf_paths', 'image_paths', 'video_links'];


}
