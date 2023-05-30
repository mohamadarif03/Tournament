<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournamentRequest extends FormRequest
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
            'description' => 'required',
            'live_image_url' => 'required|mimes:jpg,jpeg,png',
            'completed_at' => 'required',
            'starter_at' => 'required',
            'slot' => 'required',
            'price_pool' => 'required',
            'game_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'description.required' => 'Deskripsi Wajib Diisi',
            'live_image_url.required' => 'Foto Wajib Diisi',
            'live_image_url.mimes' => 'Foto Hanya Diperbolehkan Berformat JPG, JPEG, PNG',
            'completed_at.required' => 'Tanggal Berakhir Turnamen Wajib Diisi',
            'slot.required' => 'Slot Wajib Diisi',
            'price_pool.required' => 'Hadiah Turnamen Wajib Diisi',
            'game_id.required' => 'Game Wajib Diisi',
            'starter_at.required' => 'Tanggal Dimulai Wajib Diisi',
        ];
    }
}
