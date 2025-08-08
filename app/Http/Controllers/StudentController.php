<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display the student dashboard.
     */
    public function index()
    {
        $student = auth()->user()->student;
        
        $stats = [
            'current_class' => $student ? $student->schoolClass->name ?? 'Not Assigned' : 'Not Assigned',
            'total_subjects' => $student && $student->schoolClass ? $student->schoolClass->schedules()->distinct('subject_id')->count() : 0,
            'average_grade' => 85.5, // Mock data
            'attendance_percentage' => 95.2, // Mock data
        ];

        $upcomingAssignments = []; // Mock data
        $recentGrades = []; // Mock data

        return Inertia::render('student/dashboard', [
            'stats' => $stats,
            'upcomingAssignments' => $upcomingAssignments,
            'recentGrades' => $recentGrades
        ]);
    }
}