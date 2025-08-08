<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Attendance>
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::factory()->state(['role' => 'student']),
            'schedule_id' => Schedule::factory(),
            'date' => fake()->dateTimeBetween('-30 days', 'now'),
            'status' => fake()->randomElement(['present', 'absent', 'late', 'excused', 'sick']),
            'notes' => fake()->optional()->sentence(),
            'recorded_by' => User::factory()->state(['role' => 'teacher']),
        ];
    }
}