<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStatus extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'alias',
    ];
}
