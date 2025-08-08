<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AcademicYear>
 */
class AcademicYearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<AcademicYear>
     */
    protected $model = AcademicYear::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startYear = fake()->numberBetween(2020, 2025);
        $endYear = $startYear + 1;
        
        return [
            'name' => "{$startYear}/{$endYear}",
            'start_date' => "{$startYear}-07-01",
            'end_date' => "{$endYear}-06-30",
            'is_active' => false,
        ];
    }

    /**
     * Indicate that the academic year is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }
}