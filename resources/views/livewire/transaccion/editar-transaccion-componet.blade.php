<div>
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3">Datos de Transacion</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('demo'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('demo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    {{-- alerta --}}
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible text-white" role="alert">{{ Session::get('message') }}
                        </div>
                    @endif
                    <form wire:submit.prevent='updateTansaccion'>
                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Usuario Cliente</label>
                                <select class="form-control border border-2 p-2" wire:model="user_id">
                                    <option value="">Selecione al Cliente</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Membresia</label>
                                <select class="form-control border border-2 p-2" wire:model="membresia_id">
                                    <option value="">Selecione la Membresia</option>
                                    @foreach ($membresias as $membresia)
                                        <option value="{{ $membresia->id }}">{{ $membresia->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('membresia_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Fecha y hora de la transaccion</label>
                                <input wire:model="fecha_hora_transaccion" type="datetime-local"
                                    class="form-control border border-2 p-2">
                                @error('fecha_hora_transaccion')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tipo de Transaccion:</label>
                                <select wire:model="tipo_transaccion" class="form-control border border-2 p-2">
                                    <option value="">Selecciona un método de pago</option>
                                    <option value="Compra de membresía">Compra de membresía</option>
                                    <option value="Renovación de membresía">Renovación de membresía</option>
                                    <option value="Reserva de instalaciones">Reserva de instalaciones</option>
                                    <option value="Clase particular">Clase particular</option>
                                    <option value="Pago de mensualidad">Pago de mensualidad</option>
                                </select>
                                @error('tipo_transaccion')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Datos de Pago</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Monto Bs.</label>
                                <input wire:model="monto" type="number" class="form-control border border-2 p-2">
                                @error('monto')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Metodo de Pago:</label>
                                <select wire:model="metodo_pago" class="form-control border border-2 p-2">
                                    <option value="">Selecciona un método de pago</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="QR">QR</option>
                                    <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                                    <option value="Tarjeta de débito">Tarjeta de débito</option>
                                    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                </select>
                                @error('metodo_pago')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Estado de la transaccion</label>
                                <select wire:model="estado_transaccion" class="form-control border border-2 p-2">
                                    <option value="">Selecciona un estado de transacción</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En progreso">En progreso</option>
                                    <option value="Completado">Completado</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Fallido">Fallido</option>
                                </select>
                                @error('estado_transaccion')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Descripcion:</label>
                                <textarea wire:model="description" class="form-control border border-2 p-2" placeholder=" Say something about yourself"
                                    rows="4" cols="50"></textarea>
                                @error('description')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                        </div>
                        <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Cancelar</button>
                        <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
