<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<SchoolClass>
     */
    protected $model = SchoolClass::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grade = fake()->randomElement(['X', 'XI', 'XII']);
        $major = fake()->randomElement(['TKJ', 'MM', 'AK', 'DKV']);
        $number = fake()->numberBetween(1, 3);

        return [
            'name' => "{$grade} {$major} {$number}",
            'grade' => $grade,
            'major' => $major,
            'homeroom_teacher_id' => User::factory()->state(['role' => 'teacher']),
            'academic_year_id' => AcademicYear::factory(),
            'capacity' => fake()->numberBetween(30, 36),
        ];
    }
}