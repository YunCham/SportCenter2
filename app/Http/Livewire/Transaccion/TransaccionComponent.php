<?php

namespace App\Http\Livewire\Transaccion;

use App\Models\Transaccion;
use Livewire\Component;
use Livewire\WithPagination;

class TransaccionComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $transaccions = Transaccion::orderBy('id', 'ASC')->paginate(8);
        return view('livewire.transaccion.transaccion-component',['transaccions' => $transaccions]);
    }
}
