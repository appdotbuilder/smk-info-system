<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AssignmentSubmission>
 */
class AssignmentSubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<AssignmentSubmission>
     */
    protected $model = AssignmentSubmission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isGraded = fake()->boolean(70);
        
        return [
            'assignment_id' => Assignment::factory(),
            'student_id' => User::factory()->state(['role' => 'student']),
            'content' => fake()->optional()->paragraph(),
            'attachments' => fake()->optional()->randomElements([
                'submission.pdf',
                'project.zip',
                'report.docx'
            ], fake()->numberBetween(1, 2)),
            'submitted_at' => fake()->dateTimeBetween('-1 week', 'now'),
            'score' => $isGraded ? fake()->randomFloat(2, 60, 100) : null,
            'feedback' => $isGraded ? fake()->optional()->paragraph() : null,
            'graded_by' => $isGraded ? User::factory()->state(['role' => 'teacher']) : null,
            'graded_at' => $isGraded ? fake()->dateTimeBetween('now', '+3 days') : null,
            'status' => $isGraded ? 'graded' : fake()->randomElement(['submitted', 'late']),
        ];
    }
}