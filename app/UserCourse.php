<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vanguard\Course;

class UserCourse extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }
}
