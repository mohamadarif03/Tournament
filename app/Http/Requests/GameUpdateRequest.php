<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameUpdateRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable',
            'logo' => 'nullable',
        ];
    }
}
