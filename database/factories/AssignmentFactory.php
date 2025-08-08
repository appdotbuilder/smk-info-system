<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Assignment>
     */
    protected $model = Assignment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(3),
            'subject_id' => Subject::factory(),
            'teacher_id' => User::factory()->state(['role' => 'teacher']),
            'class_id' => SchoolClass::factory(),
            'due_date' => fake()->dateTimeBetween('now', '+2 weeks'),
            'max_score' => fake()->numberBetween(50, 100),
            'attachments' => fake()->optional()->randomElements([
                'material1.pdf',
                'presentation.pptx',
                'worksheet.docx'
            ], fake()->numberBetween(0, 3)),
            'status' => fake()->randomElement(['draft', 'published', 'closed']),
        ];
    }
}