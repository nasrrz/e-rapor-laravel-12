<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'nisn',
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'class_id',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function courseSections()
    {
        // A student belongs to a class, and that class has course sections
        // But maybe we want the sections the student is "enrolled" in? 
        // In this schema, enrollment is implied by Class.
        // So a student in Class X has all subjects/sections for Class X.
        return $this->hasManyThrough(
            CourseSection::class,
            SchoolClass::class,
            'id', // Foreign key on classes table... wait. hasManyThrough is for One-To-Many-To-Many or similar.
            // Student -> belongsTo Class -> hasMany CourseSections.
            // This is actually $this->schoolClass->courseSections.
            'class_id', // Foreign key on students table
            'id', // Local key on students table
            'id' // Local key on classes table
        );
        // Actually, logic: "Get all sections for the student's current class".
        // hasManyThrough is usually Parent -> Child -> Grandchild.
        // Here Student (Child) -> Class (Parent) -> CourseSections (Child of Parent).
        // This is "Sibling" relation? No.
        // Student belongsTo Class. Class hasMany CourseSection.
        // So $student->schoolClass->courseSections.
    }
}
