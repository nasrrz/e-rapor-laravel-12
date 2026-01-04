<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'course_section_id',
        'student_id',
        'type',
        'score',
        'description',
    ];

    /**
     * Get the student for this grade.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the course section.
     */
    public function courseSection()
    {
        return $this->belongsTo(CourseSection::class);
    }

    /**
     * Calculate Final Score Logic
     * 
     * @param int $studentId
     * @param int $courseSectionId
     * @return float
     */
    public static function calculateFinalScore($studentId, $courseSectionId)
    {
        $grades = self::where('student_id', $studentId)
            ->where('course_section_id', $courseSectionId)
            ->get();

        if ($grades->isEmpty()) {
            return 0;
        }

        // Example Logic:
        // Harian (Daily): 30%
        // UTS (Midterm): 30%
        // UAS (Final): 40%

        $dailyAvg = $grades->where('type', 'daily')->avg('score') ?? 0;
        $midterm = $grades->where('type', 'midterm')->avg('score') ?? 0; // Assuming usually one, but avg if multiple
        $final = $grades->where('type', 'final')->avg('score') ?? 0;

        $finalScore = ($dailyAvg * 0.30) + ($midterm * 0.30) + ($final * 0.40);

        return round($finalScore, 2);
    }
}
