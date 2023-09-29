<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StagiairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Stagiaire::factory(10)->create([
            "groupe_id" => \App\Models\Groupe::create(["label" => "DD101"]),
        ]);

        \App\Models\Stagiaire::factory(15)->create([
            "groupe_id" => \App\Models\Groupe::create(["label" => "DD102"]),
        ]);

        \App\Models\Stagiaire::factory(25)->create([
            "groupe_id" => \App\Models\Groupe::create(["label" => "DD103"]),
        ]);
    }
}
