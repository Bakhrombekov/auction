<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Paintings', 'alias' => 'paintings', 'icon' => 'ri-paint-brush-line'],
            ['name' => 'Drawings', 'alias' => 'drawings', 'icon' => 'ri-quill-pen-line'],
            ['name' => 'Photographic Images', 'alias' => 'photographic-images', 'icon' => 'ri-image-line'],
            ['name' => 'Sculptures', 'alias' => 'sculptures', 'icon' => 'ri-hammer-line'],
            ['name' => 'Carvings', 'alias' => 'carvings', 'icon' => 'ri-tree-line'],
            ['name' => 'Cars', 'alias' => 'cars', 'icon' => 'ri-car-line'],
        ];

        foreach ($data as $category) {
            Category::create($category);
        }
    }
}
