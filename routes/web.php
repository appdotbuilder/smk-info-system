<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::get('/', [SchoolController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        $user = auth()->user();
        
        switch ($user->role) {
            case 'administrator':
                return app(AdminController::class)->index();
            case 'teacher':
                return app(TeacherController::class)->index();
            case 'student':
                return app(StudentController::class)->index();
            case 'parent':
                return app(ParentController::class)->index();
            default:
                return Inertia::render('dashboard');
        }
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
