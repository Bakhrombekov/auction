<?php

namespace Database\Seeders;

use App\Models\ProductStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductStatusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'In Stock',
            'Sold',
            'Disabled'
        ];

        foreach ($data as $status) {
            ProductStatus::create([
                'name' => $status,
                'alias' => Str::slug($status)
            ]);
        }
    }
}
