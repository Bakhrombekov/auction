<?php

namespace App\DTOs;

use App\Http\Requests\ProductRequest;
use Spatie\LaravelData\Data;

class ProductDTO extends Data
{
    public function __construct(
        public string  $name,
        public string  $code,
        public string  $author,
        public int     $year,
        public int     $classification_id,
        public ?string $description,
        public string  $auction_date,
        public float   $price,
        public int     $status_id,
        public int     $category_id,
        public string  $image,
        public int     $material_id,

    ){}

    public static function fromRequest(ProductRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            code: $request->input('code'),
            author: $request->input('author'),
            year: $request->input('year'),
            classification_id: $request->input('classification_id'),
            description: $request->input('description'),
            auction_date: $request->input('auction_date'),
            price: $request->input('price'),
            status_id: $request->input('status_id'),
            category_id: $request->input('category_id'),
            image: $request->hasFile('image') ? $request->file('image')->store('products') : $request->input('image_url', null),
            material_id: $request->input('material_id'),
        );
    }
}
