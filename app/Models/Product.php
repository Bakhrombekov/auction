<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'author',
        'year',
        'classification_id',
        'description',
        'auction_date',
        'price',
        'status_id',
        'category_id',
        'image',
        'material_id',
    ];

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ProductStatus::class, 'status_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    protected function casts(): array
    {
        return [
            'auction_date' => 'datetime',
        ];
    }

    public function scopeFilterByName(Builder $query, string|null $name): Builder
    {
        if ($name === null) {
            return $query;
        }
        return $query->where('name', 'like', "%$name%");
    }

    public function scopeFilterByCategory(Builder $query, int|null $category): Builder
    {
        if ($category === null) {
            return $query;
        }
        return $query->where('category_id', $category);
    }

    public function scopeFilterByClassification(Builder $query, int|null $classification): Builder
    {
        if ($classification === null) {
            return $query;
        }
        return $query->where('classification_id', $classification);
    }

    public function scopeFilterByMaterial(Builder $query, int|null $material): Builder
    {
        if ($material === null) {
            return $query;
        }
        return $query->where('material_id', $material);
    }

    public function scopeFilterByPrice(Builder $query, int|null $from, int|null $to): Builder
    {
        if (($to === null and $from === null) or ($to < $from)) {
            return $query;

        }
        if ($from > 0 and $to === null) {
            return $query->where('material_id', '>', $from);
        }
        if ($from === null and $to > 0) {
            return $query->where('material_id', '<', $to);
        }
        if ($from > 0 and $to > $from and $to > 0) {
            return $query->where('material_id', '>' , (int)$from)->where('material_id', '<', (int)$to);
        }
        return $query;
    }

    public function scopeFilterByAuthor(Builder $query, string|null $author): Builder
    {
        if ($author === null) {
            return $query;
        }
        return $query->where('author', 'like', "%$author%");
    }
}
