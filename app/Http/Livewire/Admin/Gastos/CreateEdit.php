<?php

namespace App\Http\Livewire\Admin\Gastos;

use App\Models\DetalleGastos;
use App\Models\Gastos;
use Filament\Notifications\Notification;
use Livewire\Component;

class CreateEdit extends Component
{
    // variables
    public $titulo_modulo = 'Crear Nuevo Gasto';

    // variables de tipo create o edit
    public $modo = 'create';
    public $modo_detalle = 'create';
    public $save_gasto = 'save_gasto';
    public $button = 'Guardar';

    // variables de gasto
    public $gasto = null;
    public $gasto_bolean = false;
    public $gasto_id = null;
    public $titulo;
    public $descripcion;
    public $monto_ingreso;
    public $monto_gastado;
    public $monto_restante;

    // variables de detalle gasto
    public $detalle_gasto = null;
    public $detalle_gasto_id;
    public $descripcion_detalle;
    public $monto;
    public $monto_anterior;

    public function mount()
    {
        if ($this->gasto_id) {
            $this->gasto = Gastos::find($this->gasto_id);
            if ($this->gasto) {
                $this->modo_update($this->gasto);
            }else{
                return abort(404);
            }
        }else{
            $this->gasto_bolean = false;
        }

    }

    public function modo_update($gasto)
    {
        $this->titulo_modulo = 'Editar Gasto';
        $this->modo = 'edit';
        $this->gasto_bolean = true;
        $this->save_gasto = 'update_gasto';
        $this->button = 'Actualizar';

        // variables de gasto
        $this->gasto_id = $gasto->id;
        $this->titulo = $gasto->title;
        $this->descripcion = $gasto->description;
        $this->monto_ingreso = $gasto->monto_ingreso;
        $this->monto_gastado = $gasto->monto_gasto;
        $this->monto_restante = $gasto->monto_restante;

        // variables de detalle gasto
        $this->detalle_gasto = DetalleGastos::where('gastos_id', $gasto->id)->get();
    }

    public function updated($propertyName)
    {
        // Validacion de datos del formulario en tiempo real de gastos
        if ($this->modo === 'create') {
            $this->validateOnly($propertyName, [
                'titulo' => 'required|min:3',
                'descripcion' => 'required|min:3|max:255',
                'monto_ingreso' => 'required|numeric',
            ]);
        }
        if ($this->modo === 'edit') {
            $this->validateOnly($propertyName, [
                'titulo' => 'required|min:3',
                'descripcion' => 'required|min:3',
                'monto_ingreso' => 'required|numeric',
                'monto_gastado' => 'required|numeric',
                'monto_restante' => 'required|numeric',
            ]);
        }
        // Validacion de datos del formulario en tiempo real de detalle gastos
        if ($this->modo === 'edit' && $this->gasto_bolean === true) {
            $this->validateOnly($propertyName, [
                'descripcion_detalle' => 'required|min:3',
                'monto' => 'required|numeric',
            ]);
        }
    }

    public function limpiar_gasto()
    {
        $this->reset([
            'titulo',
            'descripcion',
            'monto_ingreso',
            'monto_gastado',
            'monto_restante',
        ]);
    }

    public function save_gasto()
    {
        // Validacion de datos del formulario de gastos
        $this->validate([
            'titulo' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'monto_ingreso' => 'required|numeric',
        ]);

        // Guardar datos de gastos
        $gasto = new Gastos();
        $gasto->title = $this->titulo;
        $gasto->description = $this->descripcion;
        $gasto->monto_ingreso = $this->monto_ingreso;
        $gasto->monto_gasto = 0;
        $gasto->monto_restante = $this->monto_ingreso; // monto ingreso - monto gastado
        $gasto->status = 1;
        $gasto->user_id = auth()->user()->id;
        $gasto->save();

        // asiganar valores a variables de gasto
        $this->gasto_id = $gasto->id;
        $this->gasto = $gasto;
        $this->modo_update($gasto);

        // notificacion de exito
        Notification::make()
            ->title('Gasto creado correctamente!')
            ->success()
            ->send();

        // Redireccionar a la pagina de editar gasto
        if(auth()->user()->role === 'admin'){
            return redirect()->route('admin.gastos.edit', $this->gasto_id);
        }else{
            return redirect()->route('client.gastos.edit', $this->gasto_id);
        }
    }

    public function update_gasto()
    {
        // Validacion de datos del formulario de gastos
        $this->validate([
            'titulo' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'monto_ingreso' => 'required|numeric',
        ]);

        // Actualizar datos de gastos
        $gasto = Gastos::find($this->gasto_id);
        $gasto->title = $this->titulo;
        $gasto->description = $this->descripcion;
        $gasto->monto_ingreso = $this->monto_ingreso;
        $gasto->monto_gasto = $this->monto_gastado;
        $gasto->monto_restante = $this->monto_ingreso - $this->monto_gastado; // monto ingreso - monto gastado
        $gasto->save();

        // asiganar valores a variables de gasto
        $this->gasto_id = $gasto->id;
        $this->gasto = $gasto;
        $this->modo_update($gasto);

        // notificacion de exito
        Notification::make()
            ->title('Gasto actualizado correctamente!')
            ->success()
            ->send();

        // Redireccionar a la pagina de editar gasto
        return redirect()->back();
    }

    public function limpiar_detalle_gasto()
    {
        $this->reset([
            'descripcion_detalle',
            'monto',
            'monto_anterior',
        ]);
    }

    public function add_detalle_gasto()
    {
        // Validacion de datos del formulario de detalle gastos
        $this->validate([
            'descripcion_detalle' => 'required|min:3',
            'monto' => 'required|numeric',
        ]);

        // validar que el monto no sea mayor al monto restante
        if ($this->monto > $this->monto_restante) {
            Notification::make()
                ->title('El monto no puede ser mayor al monto restante!')
                ->danger()
                ->send();
            return;
        }

        if($this->modo_detalle === 'create'){
            // Guardar datos de detalle gastos
            $detalle_gasto = new DetalleGastos();
            $detalle_gasto->description = $this->descripcion_detalle;
            $detalle_gasto->monto = $this->monto;
            $detalle_gasto->status = 1;
            $detalle_gasto->gastos_id = $this->gasto_id;
            $detalle_gasto->save();
        }else{
            // Actualizar datos de detalle gastos
            $detalle_gasto = DetalleGastos::find($this->detalle_gasto_id);
            $detalle_gasto->description = $this->descripcion_detalle;
            $detalle_gasto->monto = $this->monto;
            $detalle_gasto->save();

            // Actualizar datos de gastos
            $gasto = Gastos::find($this->gasto_id);
            $gasto->monto_gasto = $gasto->monto_gasto - $this->monto_anterior;
            $gasto->monto_restante = $gasto->monto_ingreso - $gasto->monto_gasto; // monto ingreso - monto gastado
            $gasto->save();
        }

        // Actualizar datos de gastos
        $gasto = Gastos::find($this->gasto_id);
        $gasto->monto_gasto = $gasto->monto_gasto + $this->monto;
        $gasto->monto_restante = $gasto->monto_ingreso - $gasto->monto_gasto; // monto ingreso - monto gastado
        $gasto->save();

        // limpiar variables de detalle gasto
        $this->limpiar_detalle_gasto();

        // asiganar valores a variables de detalle gasto
        $this->detalle_gasto = $detalle_gasto;
        $this->detalle_gasto_id = $detalle_gasto->id;

        // asiganar valores a variables de gasto
        $this->gasto_id = $gasto->id;
        $this->gasto = $gasto;
        $this->modo_update($gasto);

        if($this->modo_detalle === 'create'){
            // notificacion de exito
            Notification::make()
            ->title('Detalle de gasto creado correctamente!')
            ->success()
            ->send();
        }else{
            // notificacion de exito
            Notification::make()
            ->title('Detalle de gasto actualizado correctamente!')
            ->success()
            ->send();
        }

        $this->modo_detalle = 'create';

        // Redireccionar a la pagina de editar gasto
        return redirect()->back();
    }

    public function editar_detalle_gasto(DetalleGastos $detalle_gasto)
    {
        // asiganar valores a variables de detalle gasto
        $this->detalle_gasto_id = $detalle_gasto->id;

        $this->descripcion_detalle = $detalle_gasto->description;
        $this->monto = $detalle_gasto->monto;
        $this->monto_anterior = $detalle_gasto->monto;

        $this->modo_detalle = 'edit';

        // Redireccionar a la pagina de editar gasto
        return redirect()->back();
    }

    public function eliminar_detalle_gasto(DetalleGastos $detalle_gasto)
    {
        // obtener monto de detalle gasto
        $this->monto_anterior = $detalle_gasto->monto;

        // asigar monto anterior en el gasto
        $gasto = Gastos::find($this->gasto_id);
        $gasto->monto_gasto = $gasto->monto_gasto - $this->monto_anterior;
        $gasto->monto_restante = $gasto->monto_ingreso - $gasto->monto_gasto; // monto ingreso - monto gastado
        $gasto->save();

        // eliminar detalle gasto
        $detalle_gasto->delete();

        // asiganar valores a variables de gasto
        $this->gasto_id = $gasto->id;
        $this->gasto = $gasto;
        $this->modo_update($gasto);

        // notificacion de exito
        Notification::make()
            ->title('Detalle de gasto eliminado correctamente!')
            ->success()
            ->send();

        // Redireccionar a la pagina de editar gasto
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.admin.gastos.create-edit')->layout('layouts.app');
    }
}
