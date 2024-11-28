<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true; // Consenti sempre, in base alle necessità.
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'birthday' => 'nullable|date', // La data di nascita è opzionale
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome dell\'autore è obbligatorio.',
        ];
    }
}
