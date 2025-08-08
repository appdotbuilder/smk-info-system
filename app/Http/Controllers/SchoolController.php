<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SchoolController extends Controller
{
    /**
     * Display the school dashboard.
     */
    public function index()
    {
        $currentAcademicYear = AcademicYear::active()->first();
        
        $stats = [
            'total_students' => User::byRole('student')->active()->count(),
            'total_teachers' => User::byRole('teacher')->active()->count(),
            'total_classes' => SchoolClass::when($currentAcademicYear, function ($query) use ($currentAcademicYear) {
                return $query->where('academic_year_id', $currentAcademicYear->id);
            })->count(),
            'total_subjects' => Subject::count(),
        ];

        $recentActivities = [
            [
                'type' => 'enrollment',
                'message' => 'New student enrollment period is now open',
                'time' => '2 hours ago',
                'icon' => '👥'
            ],
            [
                'type' => 'grades',
                'message' => 'Semester grades have been published',
                'time' => '1 day ago',
                'icon' => '📊'
            ],
            [
                'type' => 'payment',
                'message' => 'Monthly fee payment reminder sent',
                'time' => '2 days ago',
                'icon' => '💳'
            ],
            [
                'type' => 'schedule',
                'message' => 'Class schedules updated for next week',
                'time' => '3 days ago',
                'icon' => '📅'
            ]
        ];

        return Inertia::render('school-dashboard', [
            'stats' => $stats,
            'currentAcademicYear' => $currentAcademicYear,
            'recentActivities' => $recentActivities
        ]);
    }
}