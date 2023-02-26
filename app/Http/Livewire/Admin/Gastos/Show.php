<?php

namespace App\Http\Livewire\Admin\Gastos;

use App\Models\Gastos;
use Livewire\Component;

class Show extends Component
{
    public $gasto;
    public $gasto_id;
    public $user;
    public $detalle_gasto;

    public function mount($gasto_id)
    {
        $this->gasto_id = $gasto_id;
        $this->user = auth()->user();
        $this->gasto = Gastos::where('user_id', $this->user->id)
            ->where('id', $this->gasto_id)
            ->first();
        if (!$this->gasto) {
            abort(404);
        }else{
            $this->gasto->load('detalle_gasto');
        }
        $this->detalle_gasto = $this->gasto->detalle_gasto;
    }

    public function render()
    {


        return view('livewire.admin.gastos.show', [
            'user' => $this->user,
            'gasto' => $this->gasto,
            'detalle_gasto' => $this->detalle_gasto
        ])->layout('layouts.app');
    }
}
