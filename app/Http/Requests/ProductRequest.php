<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string'],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:0', 'max:9999'],
            'classification_id' => ['required', 'int'],
            'description' => ['nullable', 'string'],
            'auction_date' => ['required'],
            'price' => ['required', 'numeric'],
            'status_id' => ['required', 'int'],
            'category_id' => ['required', 'int'],
            'image' => $this->method() === 'POST' ? ['required', 'image'] : ['nullable', 'image'],
            'material_id' => ['required', 'int'],
            'image_url' => ['nullable', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
