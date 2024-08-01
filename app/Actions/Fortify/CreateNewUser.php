<?php

namespace App\Actions\Fortify;

use App\Mail\Register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 6;
        $key = substr(str_shuffle($caracteres), 0, $longitud);

        $correo = new Register($key);

        Mail::to($input['email'])->send($correo);

        return User::create([
            'codigo' => $key,
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'username' => $input['user_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
