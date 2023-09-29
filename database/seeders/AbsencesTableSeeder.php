<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AbsencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 26; $i++) {
            \App\Models\Absence::factory(1)->create(
                [
                    "stagiaire_id" => $i,
                    "hours" => 5,
                    "distribution" => (6 - $i) > 1 ? json_encode([((5 - $i) - 1), (5 - $i)]) : json_encode([0]),
                ]
            );
        }
    }
}
