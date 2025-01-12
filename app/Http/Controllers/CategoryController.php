<?php

namespace App\Http\Controllers;

use App\DTOs\CategoryDTO;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Throwable;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $service
    )
    {
    }


    public function index()
    {
        return view('pages.category.index', [
            'categories' => Category::paginate(10)
        ]);

    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $this->service->store(CategoryDTO::fromRequest($request));
            return redirect()->route('category.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $this->service->update(CategoryDTO::fromRequest($request), $category);
            return redirect()->route('category.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $this->service->destroy($category);
            return redirect()->route('category.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }
}
