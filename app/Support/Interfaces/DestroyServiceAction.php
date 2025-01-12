<?php

namespace App\Support\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface DestroyServiceAction
{
    public function destroy(Model $model): void;
}
