<?php

namespace App\Services;

use App\DTOs\MaterialDTO;
use App\Models\Material;
use App\Support\Interfaces\DestroyServiceAction;
use App\Support\Interfaces\StoreServiceAction;
use App\Support\Interfaces\UpdateServiceAction;
use DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;
use Throwable;

class MaterialService implements StoreServiceAction, UpdateServiceAction, DestroyServiceAction
{

    /**
     * @throws Throwable
     */
    public function store(MaterialDTO|Data $data): Material
    {
        return DB::transaction(function () use ($data): Material {
            return Material::create($data->toArray());
        });
    }

    /**
     * @throws Throwable
     */
    public function update(MaterialDTO|Data $data, Material|Model $model): Material
    {
        return DB::transaction(function () use ($data, $model): Material {
            $model->update($data->toArray());
            $model->refresh();
            return $model;
        });
    }

    /**
     * @throws Throwable
     */
    public function destroy(Material|Model $model): void
    {
        DB::transaction(function () use ($model): void {
            $model->delete();
        });
    }
}
