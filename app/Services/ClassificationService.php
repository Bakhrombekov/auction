<?php

namespace App\Services;

use App\DTOs\ClassificationDTO;
use App\Models\Classification;
use App\Support\Interfaces\DestroyServiceAction;
use App\Support\Interfaces\StoreServiceAction;
use App\Support\Interfaces\UpdateServiceAction;
use DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;
use Throwable;

class ClassificationService implements StoreServiceAction, UpdateServiceAction, DestroyServiceAction
{

    /**
     * @throws Throwable
     */
    public function store(ClassificationDTO|Data $data): Classification
    {
        return DB::transaction(function () use ($data): Classification {
            return Classification::create($data->toArray());
        });
    }

    /**
     * @throws Throwable
     */
    public function update(ClassificationDTO|Data $data, Classification|Model $model): Classification
    {
        return DB::transaction(function () use ($data, $model): Classification {
            $model->update($data->toArray());
            $model->refresh();
            return $model;
        });
    }

    /**
     * @throws Throwable
     */
    public function destroy(Classification|Model $model): void
    {
        DB::transaction(function () use ($model): void {
            $model->delete();
        });
    }
}
