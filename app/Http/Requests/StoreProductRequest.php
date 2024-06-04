<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'properties' => 'sometimes|array',
            'properties.*.name' => 'required_with:properties|string|max:255',
            'properties.*.value' => 'required_with:properties|string|max:255',
        ];
    }
}
