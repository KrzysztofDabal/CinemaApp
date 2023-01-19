<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [

            'title' => ['required', 'string', 'max:100'],
            'director' => ['required', 'string', 'max:100'],
            'scriptwriter' => ['required', 'string', 'max:100'],
            'length' => ['required', 'integer', 'max:300'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg, jpeg, png'],
            'rating' => ['required', 'integer', 'max:100'],
            'category' => ['nullable', 'max:100']
        ];

        return $rules;
    }
}
