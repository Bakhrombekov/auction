<?php

namespace App\Services;

use App\DTOs\CategoryDTO;
use App\Models\Category;
use App\Support\Interfaces\DestroyServiceAction;
use App\Support\Interfaces\StoreServiceAction;
use App\Support\Interfaces\UpdateServiceAction;
use DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;
use Throwable;

class CategoryService implements StoreServiceAction, UpdateServiceAction, DestroyServiceAction
{

    /**
     * @throws Throwable
     */
    public function store(CategoryDTO|Data $data): Category
    {
        return DB::transaction(function () use ($data): Category {
            return Category::create($data->toArray());
        });
    }

    /**
     * @throws Throwable
     */
    public function update(CategoryDTO|Data $data, Category|Model $model): Category
    {
        return DB::transaction(function () use ($data, $model): Category {
            $model->update($data->toArray());
            $model->refresh();
            return $model;
        });
    }

    /**
     * @throws Throwable
     */
    public function destroy(Category|Model $model): void
    {
        DB::transaction(function () use ($model): void {
            $model->delete();
        });
    }
}
