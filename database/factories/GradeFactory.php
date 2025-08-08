<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Grade>
 */
class GradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Grade>
     */
    protected $model = Grade::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::factory()->state(['role' => 'student']),
            'subject_id' => Subject::factory(),
            'teacher_id' => User::factory()->state(['role' => 'teacher']),
            'semester' => fake()->randomElement(['1', '2']),
            'academic_year_id' => AcademicYear::factory(),
            'grade_type' => fake()->randomElement(['assignment', 'quiz', 'midterm', 'final', 'practical']),
            'title' => fake()->sentence(3),
            'score' => fake()->randomFloat(2, 60, 100),
            'weight' => fake()->randomFloat(2, 0.5, 2.0),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}