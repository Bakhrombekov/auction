<?php

namespace App\Http\Controllers;

use App\DTOs\ProductDTO;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Services\ProductService;
use Throwable;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $service
    )
    {
    }

    public function index()
    {
        return view('pages.product.index', [
            'products' => Product::paginate(10)
        ]);

    }

    public function create()
    {
        return view('pages.product.category', ['categories' => Category::all()]);
    }

    public function show(Category $product)
    {
        $category = $product;
        return view('pages.product.create', [
            'categories' => Category::all(),
            'category' => $category,
            'materials' => $category->materials,
            'classifications' => Classification::all(),
            'statuses' => ProductStatus::all()
        ]);
    }

    public function store(ProductRequest $request)
    {

        try {
            $this->service->store(ProductDTO::fromRequest($request));
            return redirect()->route('product.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function edit(Product $product)
    {
        return view('pages.product.edit', [
            'categories' => Category::all(),
            'materials' => $product->category->materials,
            'classifications' => Classification::all(),
            'statuses' => ProductStatus::all(),
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $this->service->update(ProductDTO::fromRequest($request), $product);
            return redirect()->route('product.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $this->service->destroy($product);
            return redirect()->route('product.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }
}
