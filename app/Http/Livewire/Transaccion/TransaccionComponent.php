<?php

namespace App\Http\Livewire\Transaccion;

use App\Models\Transaccion;
use Livewire\Component;
use Livewire\WithPagination;

class TransaccionComponent extends Component
{
    use WithPagination;

    public $transaccion_id;

    //Implementacion  de metodo  para eliminar un registo de usuario
    public function deleteTransaccion($transaccion_id)
    {
        $transaccion = Transaccion::find($transaccion_id);
        $transaccion->delete();
        session()->flash('message','Transaccion elimidado exitosamente!');
    }

    public function render()
    {
        $transaccions = Transaccion::orderBy('id', 'ASC')->paginate(8);
        return view('livewire.transaccion.transaccion-component',['transaccions' => $transaccions]);
    }
}
