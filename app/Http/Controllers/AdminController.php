<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * Display the administrator dashboard.
     */
    public function index()
    {
        $currentAcademicYear = AcademicYear::active()->first();
        
        $stats = [
            'total_students' => User::byRole('student')->active()->count(),
            'total_teachers' => User::byRole('teacher')->active()->count(),
            'total_parents' => User::byRole('parent')->active()->count(),
            'total_classes' => SchoolClass::when($currentAcademicYear, function ($query) use ($currentAcademicYear) {
                return $query->where('academic_year_id', $currentAcademicYear->id);
            })->count(),
            'pending_registrations' => 12, // Mock data
            'monthly_revenue' => 150000000, // Mock data in IDR
        ];

        return Inertia::render('admin/dashboard', [
            'stats' => $stats,
            'currentAcademicYear' => $currentAcademicYear
        ]);
    }
}