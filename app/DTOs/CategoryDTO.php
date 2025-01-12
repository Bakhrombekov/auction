<?php

namespace App\DTOs;

use App\Http\Requests\CategoryRequest;
use Spatie\LaravelData\Data;

class CategoryDTO extends Data
{

    public function __construct(
        public string $name,
        public string $alias,
        public string $icon,
    )
    {
    }

    public static function fromRequest(CategoryRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            alias: str($request->input('name'))->trim()->slug()->toString(),
            icon: (is_null($request->input('icon','ri-golf-ball-fill'))) ? 'ri-golf-ball-fill' : $request->input('icon'),
        );
    }
}
