<?php

namespace App\Http\Livewire\Transaccion;

use App\Models\Membresia;
use App\Models\Transaccion;
use App\Models\User;
use Livewire\Component;

class EditarTransaccionComponet extends Component
{
    public $transaccion_id;
    public $fecha_hora_transaccion;
    public $tipo_transaccion;
    public $description;
    public $monto;
    public $metodo_pago;
    public $estado_transaccion;
    public $user_id;
    public $membresia_id;

    public function mount($transaccion_id)
    {
        $transaccion = Transaccion::find($transaccion_id);
        $this->transaccion_id = $transaccion->id;
        $this->fecha_hora_transaccion = $transaccion->fecha_hora_transaccion;
        $this->tipo_transaccion = $transaccion->tipo_transaccion;
        $this->description = $transaccion->description;
        $this->monto = $transaccion->monto;
        $this->metodo_pago = $transaccion->metodo_pago;
        $this->estado_transaccion = $transaccion->estado_transaccion;
        $this->user_id = $transaccion->user_id;
        $this->membresia_id = $transaccion->membresia_id;
    }
  
    //Implement of the funtion update
    public function updated($fields)
    {
      $this->validateOnly($fields, [
       // 'fecha_hora_transaccion' => 'required',
        'tipo_transaccion' => 'required',
        'description' => 'required',
        'monto' => 'required',
        'metodo_pago' => 'required',
        'estado_transaccion' => 'required',
        'user_id' => 'required',
        'membresia_id' => 'required'
      ]);
    }
  
      //Implementacion de la  funcion de gruardar  datos
  public function updateTansaccion()
  {
    $this->validate([
      //'fecha_hora_transaccion' => 'required',
      'tipo_transaccion' => 'required',
      'description' => 'required',
      'monto' => 'required',
      'metodo_pago' => 'required',
      'estado_transaccion' => 'required',
      'user_id' => 'required',
      'membresia_id' => 'required'
    ]);

    $transaccion = Transaccion::find($this->transaccion_id);

    $transaccion->fecha_hora_transaccion = $this->fecha_hora_transaccion;
    $transaccion->tipo_transaccion = $this->tipo_transaccion;
    $transaccion->description = $this->description;
    $transaccion->monto = $this->monto;
    $transaccion->metodo_pago = $this->metodo_pago;
    $transaccion->estado_transaccion = $this->estado_transaccion;
    $transaccion->user_id = $this->user_id;
    $transaccion->membresia_id = $this->membresia_id;


    $transaccion->save();
    //return redirect(route('transaccion'))->with('message', 'Nueva Transaccion registrada!');
     session()->flash('message', ' Registro Actualizado exitoso!');
  }

      //función para retroceder
      public function goBack()
      {
        // Lógica adicional si es necesario
        $this->redirect(route('transaccion'));
      }

    public function render()
    {
    $users = User::orderBy('name', 'ASC')->get();
    $membresias = Membresia::orderBy('nombre', 'ASC')->get();
        return view('livewire.transaccion.editar-transaccion-componet', ['users' => $users, 'membresias' => $membresias]);
    }
}
