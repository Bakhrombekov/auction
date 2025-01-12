<?php

namespace App\Support\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

interface UpdateServiceAction
{
    public function update(Data $data, Model $model): Model;
}
