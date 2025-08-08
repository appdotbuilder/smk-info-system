<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display the teacher dashboard.
     */
    public function index()
    {
        $teacher = auth()->user()->teacher;
        $currentAcademicYear = AcademicYear::active()->first();
        
        $stats = [
            'total_classes' => $teacher ? $teacher->schedules()->distinct('class_id')->count() : 0,
            'total_students' => $teacher ? Student::whereHas('schoolClass.schedules', function ($query) use ($teacher) {
                $query->where('teacher_id', $teacher->user_id);
            })->count() : 0,
            'pending_assignments' => 5, // Mock data
            'homeroom_class' => $teacher ? $teacher->homeroomClasses()->first() : null,
        ];

        $upcomingSchedules = []; // Mock data - would come from actual schedules

        return Inertia::render('teacher/dashboard', [
            'stats' => $stats,
            'upcomingSchedules' => $upcomingSchedules,
            'currentAcademicYear' => $currentAcademicYear
        ]);
    }
}