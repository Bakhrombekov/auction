<?php

namespace Database\Seeders;

use App\Models\Column;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Dimensions', 'alias' => 'dimensions', 'placeholder' => '(Height × Length × Width in cm).'],
            ['name' => 'Has Frame', 'alias' => 'frame', 'placeholder' => 'Has Frame'],
            ['name' => 'Type', 'alias' => 'type', 'placeholder' => 'Type or material'],
            ['name' => 'Approximate weight', 'alias' => 'weight', 'placeholder' => 'Approximate weight (in kg)'],
        ];

        foreach ($data as $column) {
            Column::create($column);
        }
    }
}
