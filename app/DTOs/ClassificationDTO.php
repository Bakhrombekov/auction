<?php

namespace App\DTOs;

use App\Http\Requests\ClassificationRequest;
use Spatie\LaravelData\Data;

class ClassificationDTO extends Data
{

    public function __construct(
        public string $name
    )
    {
    }

    public static function fromRequest(ClassificationRequest $request): self
    {
        return new self(
            name: $request->input('name')
        );
    }
}
