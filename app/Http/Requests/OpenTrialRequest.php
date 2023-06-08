<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenTrialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'team_id' => 'required',
            'desc' => 'required',
            'close_registration' => 'required',
            'location' => 'required',
            'salary' => 'required',
        ];
    }
    public function messages(): array
    {
        return[
            'team_id.required' => 'Team Wajib Wajib Diisi',
            'desc.required' => 'Deskripsi Wajib Diisi',
            'close_registration.required' => 'Tanggal Berakhir Pendaftaran Wajib Diisi',
            'location.required' => 'Lokasi Wajib Diisi',
            'salary.required' => 'Gaji Wajib Diisi',
        ];
    }
}
