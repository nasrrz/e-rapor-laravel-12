<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'level',
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function courseSections()
    {
        return $this->hasMany(CourseSection::class, 'class_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_sections', 'class_id', 'subject_id')
            ->withPivot('academic_year_id', 'teacher_id');
    }
}
