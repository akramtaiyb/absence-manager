<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seance>
 */
class SeanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $modulesIds = \App\Models\Module::pluck('id')->all();
        $groupesIds = \App\Models\Groupe::pluck('id')->all();

        return [
            "label" => "Développer en Backend: Seance 1",
            "module_id" => fake()->randomElement($modulesIds),
            "date" => Carbon::today()->format("Y-m-d"),
            "start_time" => Carbon::parse("08:30")->format("H:i"),
            "end_time" => Carbon::parse("13:30")->format("H:i"),
            "type" => fake()->randomElement(["en ligne", "présentielle"]),
            "groupe_id" => fake()->randomElement($groupesIds),
        ];
    }
}
