<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required',
            'logo' => 'required|mimes: jpg,jpeg,png',
            'description' => 'required',
            'game_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return[
            'name.required' => 'Nama Wajib Diisi',
            'logo.required' => 'Logo Wajib Diisi',
            'logo.mimes' => 'Logo Harus Berformat JPG, JPEG, ataupun PNG',
            'description.required' => 'Deskripsi Wajib Diisi',
            'game_id' => 'Game Wajib Diisi',
        ];
    }
}
