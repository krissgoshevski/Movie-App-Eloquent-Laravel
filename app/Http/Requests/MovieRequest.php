<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'length' => 'required|integer',
            'year' => 'required|integer',
            'description' => 'required|string',
            'images' => 'required|array',
            'actors' => 'required|array',
            'directors' => 'required|array',
            'genres' => 'required|array',
            'rating_id' => 'required|exists:ratings,id',
            'type_id' => 'required|exists:types,id',
        ];

    }
}
