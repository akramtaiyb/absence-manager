<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\AssignOp\Mod;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'first_name' => 'sihame',
             'last_name' => 'itchimouh',
             'title' => 'Mme.',
             'email' => 'test@example.com',
             'password' => Hash::make('admin'),
         ]);

         $this->call([
             StagiairesTableSeeder::class,
             ModulesTableSeeder::class,
//             SeancesTableSeeder::class,
//             AbsencesTableSeeder::class
         ]);
    }
}
