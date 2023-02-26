<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $email;
    public $password;
    public $password_confirmation;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);
    }

    public function register()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $this->nombre;
        $user->last_name = $this->apellido_paterno;
        $user->last_name2 = $this->apellido_materno;
        $user->name_complete = $this->nombre . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->role = 'client';
        $user->save();

        auth()->login($user);

        return redirect()->route('client.home');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
