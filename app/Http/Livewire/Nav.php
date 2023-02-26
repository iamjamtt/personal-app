<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Nav extends Component
{
    protected $listeners = [
        'render',
        'user_updated',
    ];

    public function user_updated()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.nav');
    }
}
