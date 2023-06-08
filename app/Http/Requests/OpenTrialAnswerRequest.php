<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenTrialAnswerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'answer' => 'required',
            'open_trial_question_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return[
            'answer.required' => 'Jawaban Wajib Diisi',
            'open_trial_question_id.required' => 'Wajib Diisi',
        ];
    }
}
