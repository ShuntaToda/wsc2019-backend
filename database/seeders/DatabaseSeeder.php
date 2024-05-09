<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'email' => 'demo1@worldskills.org',
            'password' => 'demopass1'
        ]);
        User::create([
            'email' => 'demo2@worldskills.org',
            'password' => 'demopass2'
        ]);
    }
}
