<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'user_id' => ['nullable', 'integer', 'max:100'],
            'seance_id' => ['nullable', 'integer', 'max:100'],
            'seat_row' => ['nullable', 'integer', 'max:100'],
            'seat_column' => ['nullable', 'integer', 'max:100'],
        ];

        return $rules;
    }
}
