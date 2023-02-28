<?php

namespace App\Http\Livewire\Admin\Perfil;

use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    // withFileUploads sirve para subir archivos al servidor en livewire
    use WithFileUploads;

    public $user_id; // User id
    public $user; // User model
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $email;
    public $password;
    public $photo;
    public $portada;

    public function mount($id)
    {
        // verificar si el usuario existe
        $user = User::find($id);
        if (!$user) {
            // si no existe, redireccionar a la pagina de perfil
            return abort(404);
        }elseif($user->id != auth()->user()->id){
            // si no es el usuario logueado, redireccionar a la pagina de perfil
            if(auth()->user()->role === 'admin'){
                return redirect()->route('admin.perfil');
            }else{
                return redirect()->route('client.perfil');
            }
        }else{
            // si existe, asignar valores a las variables
            $this->user_id = $user->id;
            $this->nombre = $user->name;
            $this->apellido_paterno = $user->last_name;
            $this->apellido_materno = $user->last_name2;
            $this->email = $user->email;
            $this->password = "";
        }
    }

    public function updated($propertyName)
    {
        // Validacion de datos del formulario en tiempo real
        $this->validateOnly($propertyName, [
            'nombre' => 'required|min:3',
            'apellido_paterno' => 'required|min:3',
            'apellido_materno' => 'required|min:3',
            'email' => 'required|email',
            'photo' => 'nullable|image|max:5048|mimes:jpg,jpeg,png',
            'portada' => 'nullable|image|max:10048|mimes:jpg,jpeg,png',
        ]);
    }

    public function update_perfil()
    {
        // Validacion de datos del formulario
        $this->validate([
            'nombre' => 'required|min:3',
            'apellido_paterno' => 'required|min:3',
            'apellido_materno' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'photo' => 'nullable|image|max:5048|mimes:jpg,jpeg,png',
            'portada' => 'nullable|image|max:10048|mimes:jpg,jpeg,png',
        ]);

        // Update user data in database
        $user = User::find($this->user_id);
        $user->name = $this->nombre;
        $user->last_name = $this->apellido_paterno;
        $user->last_name2 = $this->apellido_materno;
        $user->email = $this->email;
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        if ($this->photo) {
            $path = 'assets/img/profiles/';
            $name = 'profile-' . $user->id . '.' . $this->photo->extension();
            $this->photo->storeAs($path, $name, 'file_public');
            $user->photo_path = $path . $name;
        }
        if ($this->portada) {
            $path = 'assets/img/covers/';
            $name = 'cover-' . $user->id . '.' . $this->portada->extension();
            $this->portada->storeAs($path, $name, 'file_public');
            $user->portada_path = $path . $name;
        }
        $user->save();

        // notificacion de exito
        Notification::make()
            ->title('Perfil actualizado correctamente!')
            ->success()
            ->seconds(5)
            ->send();

        //emitir un evento para actualizar el navbar
        $this->emit('user_updated');

        // redireccionar a la vista de perfil
        if(auth()->user()->role === 'admin'){
            return redirect()->route('admin.perfil');
        }else{
            return redirect()->route('client.perfil');
        }
    }

    public function render()
    {
        $this->user = User::find($this->user_id);
        return view('livewire.admin.perfil.edit', [
            'user' => $this->user
        ])->layout('layouts.app');
    }
}
