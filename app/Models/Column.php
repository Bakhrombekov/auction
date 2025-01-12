<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Column extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'alias',
        'placeholder',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'related_columns', 'column_id', 'category_id');
    }
}
