<?php

namespace App\Http\Livewire\Admin\Gastos;

use App\Models\Gastos;
use Livewire\Component;

class Show extends Component
{
    public $gasto_id;

    public function mount($gasto_id)
    {
        $this->gasto_id = $gasto_id;
    }

    public function render()
    {
        $user = auth()->user();
        $gasto = Gastos::where('user_id', $user->id)
            ->where('id', $this->gasto_id)
            ->first();
        $detalle_gasto = $gasto->detalle_gasto;

        return view('livewire.admin.gastos.show', [
            'user' => $user,
            'gasto' => $gasto,
            'detalle_gasto' => $detalle_gasto
        ])->layout('layouts.app');
    }
}
