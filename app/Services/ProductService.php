<?php

namespace App\Services;

use App\DTOs\ProductDTO;
use App\Models\Product;
use App\Support\Interfaces\DestroyServiceAction;
use App\Support\Interfaces\StoreServiceAction;
use App\Support\Interfaces\UpdateServiceAction;
use DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;
use Throwable;

class ProductService implements StoreServiceAction, UpdateServiceAction, DestroyServiceAction
{

    /**
     * @throws Throwable
     */
    public function store(ProductDTO|Data $data): Product
    {
        return DB::transaction(function () use ($data): Product {
            return Product::create($data->toArray());
        });
    }

    /**
     * @throws Throwable
     */
    public function update(ProductDTO|Data $data, Product|Model $model): Product
    {
        return DB::transaction(function () use ($data, $model): Product {
            $model->update($data->toArray());
            $model->refresh();
            return $model;
        });
    }

    /**
     * @throws Throwable
     */
    public function destroy(Product|Model $model): void
    {
        DB::transaction(function () use ($model): void {
            $model->delete();
        });
    }
}
