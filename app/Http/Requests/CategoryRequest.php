<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255']
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'][] = 'unique:categories,name,' . $this->category->id;
        } else {
            $rules['name'][] = 'unique:categories,name';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.string' => 'O nome da categoria deve ser uma string.',
            'name.max' => 'O nome da categoria não pode exceder 255 caracteres.',
            'name.unique' => 'Este nome de categoria já existe.',
        ];
    }
}