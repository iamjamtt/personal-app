<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gastos;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        $gastos = Gastos::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $gastos_count = Gastos::where('user_id', auth()->user()->id)
            ->count();

        return view('livewire.admin.home', [
            'gastos' => $gastos,
            'gastos_count' => $gastos_count
        ])->layout('layouts.app');
    }
}
