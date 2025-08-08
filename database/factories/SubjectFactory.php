<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Subject>
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'code' => strtoupper(fake()->lexify('???')),
            'description' => fake()->paragraph(),
            'credits' => fake()->numberBetween(2, 6),
            'type' => fake()->randomElement(['core', 'specialization', 'local']),
        ];
    }
}