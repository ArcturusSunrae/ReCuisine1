<?php

namespace App\Http\Requests;

class UpdateFoodItemRequest
{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'string'],

        ];
    }
}
