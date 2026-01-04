<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\CourseSection;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     * Often used to list sections the teacher teaches to then select one key handling grades.
     */
    public function index()
    {
        // If teacher, show their sections. If admin, show all?
        // Using auth check (assuming auth is set up later)
        // For now list all
        $sections = CourseSection::with(['subject', 'schoolClass'])->latest()->get();
        return view('grades.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     * In this context, it's "Input Grades for a Section".
     */
    public function create(Request $request)
    {
        $sectionId = $request->get('course_section_id');
        if (!$sectionId) {
            return redirect()->route('grades.index')->with('error', 'Select a section first.');
        }
        $section = CourseSection::with(['schoolClass.students'])->findOrFail($sectionId);

        return view('grades.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     * Handling bulk grade input for a section.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_section_id' => 'required|exists:course_sections,id',
            'grades' => 'required|array',
            'grades.*.student_id' => 'required|exists:students,id',
            'grades.*.type' => 'required|in:daily,midterm,final',
            'grades.*.score' => 'required|numeric|min:0|max:100',
            'grades.*.description' => 'nullable|string',
        ]);

        foreach ($validated['grades'] as $gradeData) {
            Grade::updateOrCreate(
                [
                    'course_section_id' => $validated['course_section_id'],
                    'student_id' => $gradeData['student_id'],
                    'type' => $gradeData['type'],
                ],
                [
                    'score' => $gradeData['score'],
                    'description' => $gradeData['description'] ?? null,
                ]
            );
        }

        return redirect()->back()->with('success', 'Grades saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // View specific grade details? Maybe not needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
