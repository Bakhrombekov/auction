<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'alias',
        'icon'
    ];

    public function related_columns(): BelongsToMany
    {
        return $this->belongsToMany(Column::class, 'related_columns', 'category_id', 'column_id');
    }

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
