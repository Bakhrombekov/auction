<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            ColumnSeeder::class,
            ClassificationSeeder::class,
            MaterialSeeder::class,
            ProductStatusSeeder::class,
            ProductSeeder::class

        ]);
    }
}