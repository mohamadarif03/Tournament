<?php

namespace App\Services\Auth;

use App\Contracts\Interfaces\RegisterInterface;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

class RegisterService
{

    /**
     * Handle school registration form
     *
     * @param RegisterRequest $request
     * @param RegisterInterface $register
     * @return void
     */

    public function handleRegistration(RegisterRequest $request, RegisterInterface $register): void
    {
        $data = $request->validated();
        $password = bcrypt($data['password']);

        $user = $register->store([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'phone_number' => $data['phone_number'],
        ]);
        $datas = [
            'id' => $data['name']
        ];

        $user->assignRole($data['role']);
        Mail::to($data['email'])->send(new RegistrationMail($user, $datas));
        auth()->attempt(['email' => $user['email'], 'password' => $password]);

    }
}
