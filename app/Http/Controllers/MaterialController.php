<?php

namespace App\Http\Controllers;

use App\DTOs\materialDTO;
use App\Http\Requests\MaterialRequest;
use App\Models\Category;
use App\Models\Material;
use App\Services\MaterialService;
use Throwable;

class MaterialController extends Controller
{
    public function __construct(
        private readonly MaterialService $service
    )
    {
    }

    public function index()
    {
        return view('pages.material.index', [
            'materials' => Material::paginate(10)
        ]);

    }

    public function create()
    {
        return view('pages.material.create', ['categories' => Category::all()]);
    }

    public function store(materialRequest $request)
    {
        try {
            $this->service->store(MaterialDTO::fromRequest($request));
            return redirect()->route('material.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function edit(Material $material)
    {
        $categories = Category::all();
        return view('pages.material.edit', compact('material','categories'));
    }

    public function update(MaterialRequest $request, Material $material)
    {
        try {
            $this->service->update(MaterialDTO::fromRequest($request), $material);
            return redirect()->route('material.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Material $material)
    {
        try {
            $this->service->destroy($material);
            return redirect()->route('material.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }
}
