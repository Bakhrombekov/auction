<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classification;
use App\Models\Material;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $materials = Material::all();
        $classifications = Classification::all();

        $products = Product::query()
            ->filterByName(request()->query('name'))
            ->filterByCategory(request()->query('category_id'))
            ->filterByMaterial(request()->query('material_id'))
            ->filterByClassification(request()->query('classification_id'))
            ->filterByAuthor(request()->query('author'))
            ->filterByPrice(request()->query('price_from'), request()->query('price_to'))
            ->get();

        return view('pages.dashboard.index', compact('products', 'categories', 'classifications', 'materials'));
    }
}
