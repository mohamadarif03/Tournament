<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CompetitorRegistrantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [    
            'tournament_id' => 'required',
            'competitor_id' => 'nullable',
            'user_id' => 'required',
            'position' => 'nullable',
        ];
    }
    public function messages(): array
    {
        return [    
            'tournament_id.required' => 'Tournament Id Wajib Diisi',
            'competitor_id.required' => 'Kompetitor Wajib Diisi',
            'user_id.required' => 'User Id Wajib Diisi',
        ];
    }
}
