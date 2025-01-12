<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'category_id' => ['required','integer'],
        ];
    }

    public function authorize(): bool
    {
        return true ?? auth()->user()->is_admin;
    }
}
