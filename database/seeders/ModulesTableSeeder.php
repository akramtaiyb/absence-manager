<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Module::factory(1)->create([
            "code" => 'M201',
            "title" => "Préparation d’un projet web",
        ]);

        \App\Models\Module::factory(1)->create([
            "code" => 'M202',
            "title" => "Approche agile",
        ]);
    }
}
