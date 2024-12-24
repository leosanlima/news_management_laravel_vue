<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:10'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título da notícia é obrigatório.',
            'title.max' => 'O título não pode exceder 255 caracteres.',
            'content.required' => 'O conteúdo da notícia é obrigatório.',
            'content.min' => 'O conteúdo deve ter pelo menos 10 caracteres.',
            'category_id.required' => 'Por favor, selecione uma categoria.',
            'category_id.exists' => 'A categoria selecionada não existe.',
        ];
    }
}