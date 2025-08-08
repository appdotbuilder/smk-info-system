<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ParentController extends Controller
{
    /**
     * Display the parent dashboard.
     */
    public function index()
    {
        // Mock data - in real app, would fetch children based on parent relationship
        $children = [
            [
                'name' => 'Student Name',
                'class' => 'XI TKJ 1',
                'average_grade' => 88.5,
                'attendance_percentage' => 96.2,
                'pending_fees' => 500000
            ]
        ];

        $stats = [
            'total_children' => count($children),
            'total_pending_fees' => array_sum(array_column($children, 'pending_fees')),
            'average_performance' => array_sum(array_column($children, 'average_grade')) / count($children),
        ];

        return Inertia::render('parent/dashboard', [
            'stats' => $stats,
            'children' => $children
        ]);
    }
}