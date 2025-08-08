<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\FeeType;
use App\Models\StudentFee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentFee>
 */
class StudentFeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<StudentFee>
     */
    protected $model = StudentFee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $amount = fake()->randomFloat(2, 100000, 1000000);
        $paidAmount = fake()->randomFloat(2, 0, $amount);
        $status = $paidAmount >= $amount ? 'paid' : ($paidAmount > 0 ? 'partial' : 'unpaid');

        return [
            'student_id' => User::factory()->state(['role' => 'student']),
            'fee_type_id' => FeeType::factory(),
            'academic_year_id' => AcademicYear::factory(),
            'month' => fake()->optional()->numberBetween(1, 12),
            'amount' => $amount,
            'due_date' => fake()->dateTimeBetween('now', '+3 months'),
            'status' => $status,
            'paid_amount' => $paidAmount,
        ];
    }
}