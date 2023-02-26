<?php

namespace App\Http\Livewire\Admin\Gastos;

use App\Models\Gastos;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    // variables para busqueda
    public $search = '';


    public function render()
    {
        $gastos = Gastos::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // dd($gastos->count());

        return view('livewire.admin.gastos.index', [
            'gastos' => $gastos
        ])->layout('layouts.app');
    }
}
