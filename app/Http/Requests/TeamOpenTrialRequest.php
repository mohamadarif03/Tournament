<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamOpenTrialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'cv' => 'nullable',
            'phone_number' => 'required',
            'answer' => 'required',
            'open_trial_question_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'cv.required' => 'CV Wajib Diisi',
            'phone_number.required' => 'Nomor HP Wajib Diisi',
            'answer.required' => 'Jawaban Wajib Diisi',
            'open_trial_question_id.required' => 'Pertanyaan Wajib Dijawab',
        ];
    }
}
