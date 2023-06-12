<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_hora_transaccion');
            $table->string('tipo_transaccion');
            $table->string('description');
            $table->decimal('monto', 12, 2);
            $table->string('metodo_pago');
            $table->string('estado_transaccion')->default('Pendiente');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('membresia_id');
            $table->foreign('membresia_id')->references('id')->on('membresias')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
};
