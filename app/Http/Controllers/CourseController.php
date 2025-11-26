<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('teacher')->paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get users who are staff or admin to be teachers
        $teachers = User::whereHas('role', function($q) {
            $q->whereIn('name', ['admin', 'staff']);
        })->get();
        $instruments = \App\Models\Instrument::all();
        return view('courses.create', compact('teachers', 'instruments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:users,id',
            'instrument_id' => 'nullable|exists:instruments,id',
            'price' => 'required|numeric|min:0',
            'schedule' => 'required|string|max:255',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $teachers = User::whereHas('role', function($q) {
            $q->whereIn('name', ['admin', 'staff']);
        })->get();
        $instruments = \App\Models\Instrument::all();
        return view('courses.edit', compact('course', 'teachers', 'instruments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:users,id',
            'instrument_id' => 'nullable|exists:instruments,id',
            'price' => 'required|numeric|min:0',
            'schedule' => 'required|string|max:255',
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
