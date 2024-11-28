<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:800',
            'pages' => 'nullable|integer',
            'author_id' => 'required|exists:authors,id', // verifica che l'autore esista nel database
            'category_id' => 'required|exists:categories,id', // verifica che la categoria esista nel database
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // valida l'immagine
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il titolo del libro è obbligatorio.',
            'author_id.exists' => 'L\'autore selezionato non esiste.',
            'category_id.exists' => 'La categoria selezionata non esiste.',
            'image.image' => 'Il file deve essere un\'immagine.',
            'image.mimes' => 'L\'immagine deve essere in uno dei seguenti formati: jpeg, png, jpg, gif, svg.',
            'image.max' => 'L\'immagine non può superare i 10 MB.',
        ];
    }
}
