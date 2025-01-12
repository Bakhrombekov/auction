<?php

namespace App\Support\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

interface StoreServiceAction
{

    public function store(Data $data): Model;

}
