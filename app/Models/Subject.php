<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code',
        'name',
        'kkm',
    ];

    public function courseSections()
    {
        return $this->hasMany(CourseSection::class);
    }
}
