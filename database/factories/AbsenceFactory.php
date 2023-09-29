<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "stagiaire_id" => fake()->randomElement([1, 2, 3, 4, 5]),
            "seance_id" => 1,
            "hours" => null,
            "distribution" => null,
            "reason" => fake()->realText(70),
        ];
    }
}
