<?php

namespace Database\Factories;

use App\Models\FeeType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FeeType>
 */
class FeeTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<FeeType>
     */
    protected $model = FeeType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['SPP', 'Uang Gedung', 'Uang Seragam', 'Uang Buku', 'Uang Praktikum']),
            'description' => fake()->sentence(),
            'amount' => fake()->randomFloat(2, 100000, 2000000),
            'frequency' => fake()->randomElement(['monthly', 'semester', 'annual', 'one_time']),
            'is_mandatory' => fake()->boolean(80),
            'is_active' => fake()->boolean(90),
        ];
    }
}