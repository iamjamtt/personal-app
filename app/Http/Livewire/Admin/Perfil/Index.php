<?php

namespace App\Http\Livewire\Admin\Perfil;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $user = auth()->user();
        return view('livewire.admin.perfil.index', [
            'user' => $user
        ])->layout('layouts.app');
    }
}
