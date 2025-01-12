<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Landscape'],
            ['name' => 'Seascape'],
            ['name' => 'Portrait'],
            ['name' => 'Figure'],
            ['name' => 'Still Life'],
            ['name' => 'Nude'],
            ['name' => 'Animal'],
            ['name' => 'Abstract'],
            ['name' => 'Other']
        ];

        foreach ($data as $classification) {
            Classification::create($classification);
        }
    }
}
