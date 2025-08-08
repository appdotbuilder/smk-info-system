<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Teacher>
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['role' => 'teacher']),
            'employee_number' => fake()->unique()->bothify('EMP###'),
            'nip' => fake()->unique()->numerify('##################'),
            'nuptk' => fake()->unique()->numerify('################'),
            'birth_date' => fake()->dateTimeBetween('1970-01-01', '1990-12-31'),
            'birth_place' => fake()->city(),
            'gender' => fake()->randomElement(['male', 'female']),
            'education_level' => fake()->randomElement(['S1', 'S2', 'S3']),
            'subject_specialization' => fake()->randomElement(['Matematika', 'Bahasa Indonesia', 'TIK', 'Akuntansi']),
            'hire_date' => fake()->dateTimeBetween('2000-01-01', '2024-01-01'),
            'employment_status' => fake()->randomElement(['permanent', 'contract', 'honorary']),
        ];
    }
}