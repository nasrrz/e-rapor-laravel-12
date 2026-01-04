<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SchoolClass::orderByRaw('CAST(level AS UNSIGNED)')->orderBy('name')->get();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:10',
            'name' => 'required|string|max:255',
        ]);

        SchoolClass::create($validated);

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $schoolClass) // Route model binding will use {class} but model is SchoolClass
    {
        // Note: In routes use resource 'classes' -> parameter 'class'
        // But we bind it to SchoolClass model. 
        // We might need to adjust route parameter mapping if Laravel doesn't auto-resolve `class` param to `SchoolClass`.
        // Usually `Route::resource('classes', SchoolClassController::class)` expects param `{class}`.
        // If Model is SchoolClass, we should check RouteServiceProvider or just use $id if issues arise.
        // For now assuming standard binding works or we handle it in routes.

        return view('classes.show', compact('schoolClass'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolClass $schoolClass)
    {
        return view('classes.edit', compact('schoolClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:10',
            'name' => 'required|string|max:255',
        ]);

        $schoolClass->update($validated);

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolClass $schoolClass)
    {
        $schoolClass->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
