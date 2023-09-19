<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'jumlahTeam' => 'required',
            'logo' => 'required|mimes:jpg,jpeg,png',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'jumlahTeam.required' => 'jumlah tidak boleh kosong',
            'logo.required' => 'Logo tidak boleh kosong',
            'logo.mimes' => 'Logo harus berformat JPG, JPEG, Ataupun PNG'
        ];
    }
}
