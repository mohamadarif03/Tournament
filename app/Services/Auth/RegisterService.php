<?php

namespace App\Services\Auth;

use App\Contracts\Interfaces\RegisterInterface;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\Events\Registered;

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

        $user->assignRole($data['role']);

        event(new Registered($user));

        auth()->attempt(['email' => $user['email'], 'password' => $password]);

    }
}
