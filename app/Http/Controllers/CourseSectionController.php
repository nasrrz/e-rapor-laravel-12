<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = CourseSection::with(['academicYear', 'schoolClass', 'subject', 'teacher'])->latest()->paginate(20);
        return view('course-sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicYears = AcademicYear::where('is_active', true)->get();
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        $teachers = User::where('role', 'guru')->get();

        return view('course-sections.create', compact('academicYears', 'classes', 'subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'academic_year_id' => 'required|exists:academic_years,id',
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        CourseSection::create($validated);

        return redirect()->route('course-sections.index')->with('success', 'Course Section assigned successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseSection $courseSection)
    {
        $courseSection->load(['students', 'grades']);
        return view('course-sections.show', compact('courseSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseSection $courseSection)
    {
        $academicYears = AcademicYear::all();
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        $teachers = User::where('role', 'guru')->get();

        return view('course-sections.edit', compact('courseSection', 'academicYears', 'classes', 'subjects', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseSection $courseSection)
    {
        $validated = $request->validate([
            'academic_year_id' => 'required|exists:academic_years,id',
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $courseSection->update($validated);

        return redirect()->route('course-sections.index')->with('success', 'Course Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSection $courseSection)
    {
        $courseSection->delete();
        return redirect()->route('course-sections.index')->with('success', 'Course Section deleted successfully.');
    }
}
