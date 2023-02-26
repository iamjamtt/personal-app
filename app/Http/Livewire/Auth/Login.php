<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $this->email)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                auth()->login($user);
                if ($user->role === 'admin') {
                    return redirect()->route('admin.home');
                } else {
                    return redirect()->route('client.home');
                }
            }else{
                session()->flash('error', 'Credenciales incorrectas');
            }
        }else{
            session()->flash('error', 'Credenciales incorrectas');
        }


    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
