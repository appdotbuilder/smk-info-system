<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Student>
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['role' => 'student']),
            'student_number' => fake()->unique()->numerify('2024####'),
            'nis' => fake()->unique()->numerify('########'),
            'nisn' => fake()->unique()->numerify('##########'),
            'class_id' => SchoolClass::factory(),
            'birth_date' => fake()->dateTimeBetween('2005-01-01', '2008-12-31'),
            'birth_place' => fake()->city(),
            'gender' => fake()->randomElement(['male', 'female']),
            'religion' => fake()->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha', 'Katolik']),
            'parent_info' => json_encode([
                'father_name' => fake()->name('male'),
                'mother_name' => fake()->name('female'),
                'father_phone' => fake()->phoneNumber(),
                'mother_phone' => fake()->phoneNumber(),
            ]),
            'enrollment_date' => fake()->dateTimeBetween('2024-07-01', '2024-07-31'),
            'status' => 'active',
        ];
    }
}