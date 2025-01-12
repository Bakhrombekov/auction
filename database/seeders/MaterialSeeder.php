<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'paintings' => ['Oil', 'Acrylic', 'Watercolor', 'Others']
            ],
            [
                'drawings' => ['Pencil', 'Ink', 'Charcoal', 'Others']
            ],
            [
                'photographic-images' => ['Black and White', 'Color', 'Digital', 'Others']
            ],
            [
                'sculptures' => ['Gold', 'Silver', 'Bronze', 'Marble', 'Pewter', 'Others']
            ],
            [
                'carvings' => ['Oak', 'Beech', 'Pine', 'Willow', 'Others']
            ],
            [
                'cars' => ['Sedan', 'SUV', 'Truck', 'Van', 'Others']
            ]
        ];

        foreach ($categories as $category_materials) {
            foreach ($category_materials as $category => $materials) {
                $category_id = Category::firstOrCreate(['alias' => $category], [
                    'name' => ucwords(str_replace('-', ' ', $category)),
                    'alias' => $category
                ])->id;
                foreach ($materials as $material) {
                    Material::create([
                        'name' => $material,
                        'category_id' => $category_id
                    ]);
                }
            }
        }
    }
}
