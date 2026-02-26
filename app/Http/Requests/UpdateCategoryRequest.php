<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:128'],
            'slug' => [
                'sometimes',
                'string',
                'max:128',
            ],
            'visible' => ['sometimes', 'boolean'],
        ];
    }
}
