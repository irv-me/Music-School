<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => \App\Models\User::count(),
            'courses' => \App\Models\Course::count(),
            'instruments' => \App\Models\Instrument::count(),
        ];

        // Get recent courses
        $recentCourses = \App\Models\Course::with('teacher', 'instrument')->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentCourses'));
    }
}
