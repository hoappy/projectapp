<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'apellido_P' => ['required', 'string', 'max:255'],
            'apellido_M' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'grado' => ['required', 'string', 'max:255'],
            'nombre_cargo' => ['required', 'string', 'max:255'],
            'dependencia_id' => ['required', 'integer'],

            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'apellido_P' => $input['apellido_P'],
            'apellido_M' => $input['apellido_M'],
            'direccion' => $input['direccion'],
            'fecha_nacimiento' => $input['fecha_nacimiento'],
            'grado' => $input['grado'],
            'nombre_cargo' => $input['nombre_cargo'],
            'dependencia_id' => $input['dependencia_id'],

            'password' => Hash::make($input['password']),
        ]);
    }
}
