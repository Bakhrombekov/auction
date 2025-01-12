<?php

namespace App\DTOs;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\MaterialRequest;
use App\Services\MaterialService;
use Spatie\LaravelData\Data;

class MaterialDTO extends Data
{

    public function __construct(
        public string $name,
        public int    $category_id,
    )
    {
    }

    public static function fromRequest(MaterialRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            category_id: $request->input('category_id'),
        );
    }
}
