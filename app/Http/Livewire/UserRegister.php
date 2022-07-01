<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Jetstream\Jetstream;

class UserRegister extends Component
{
    public $name = '';
    public $last_name = '';
    public $numero_identificacion = '';
    public $telefono = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'last_name' => 'required|string|min:3|max:255',
        'numero_identificacion' => 'required|integer',
        'telefono' => 'required|integer',
        'email' => 'required|string|email|max:255|unique:users'
    ];

    protected $messages = [
        'name.min:3'=>'El nombre debe contener al menos 3 caracteres',
        'last_name.min:3'=>'El apellido debe contener al menos 3 caracteres',
        'telefono.required'=>'Debes llenar el campo de teléfono',
        'telefono.integer'=>'El teléfono debe contener solo números'
    ];

    public function render()
    {
        return view('livewire.user-register');
    }

    /*
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    */
}
