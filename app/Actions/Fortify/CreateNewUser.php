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
        $messages = [
            'name.min:3'=>'El nombre debe contener al menos 3 caracteres',
            'name.required'=>'Debes llenar el campo del nombre',
            'tipo-identificacion.require'=>'Debes llenar el campo del tipo de identificación',
            'numero-identificacion.require'=>'Debes llenar el campo del número de identificación',
            'last-name.min:3'=>'El apellido debe contener al menos 3 caracteres',
            'last-name.required'=>'Debes llenar el campo del apellido',
            'telefono.required'=>'Debes llenar el campo de teléfono',
            'telefono.integer'=>'El teléfono debe contener solo números'
        ];

        Validator::make($input, [
            'name' => ['required','string','min:3','max:255'],
            'last-name' => ['required','string','min:3','max:255'],
            'tipo-identificacion' => ['required','integer'],
            'numero-identificacion' => ['required','integer'],
            'telefono' => ['required','integer'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], $messages)->validate();
            
        return User::create([
            'name' => $input['name'],
            'last_name' => $input['last-name'],
            'tipo_identificacion' => $input['tipo-identificacion'],
            'numero_identificacion' => $input['numero-identificacion'],
            'telefono' => $input['telefono'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
