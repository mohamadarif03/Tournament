<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => ['required', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }

    /**
     * Get the validation rules message.
     *
     * @return array
     */

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email telah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Password tidak cocok',
            'phone_number.required' => 'Nomor HP Tidak Boleh Kosong',
            'g-recaptcha-response.required' => 'Captcha harus diisi',
        ];
    }
}
