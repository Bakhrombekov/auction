<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColumnRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'alias' => ['required', 'string', 'max:255', 'unique:columns'],
            'placeholder' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->is_admin;
    }
}
