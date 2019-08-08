<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestro', function (Blueprint $table) {
            $table->bigIncrements('id');/* Utilizado como key autoincremental */
            $table->string('metodo_envio')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_actualizacion')->nullable(false)->useCurrent();
            $table->timestamp('fecha_factura')->nullable();
            $table->unsignedBigInteger('estado_id');
            /* $table->foreign('estado_id')->references('id')->on('estados'); */
            $table->string('tienda')->nullable();
            $table->decimal('costo_envio', 12, 4)->nullable();
            $table->decimal('intereses', 12, 4)->nullable();
            $table->decimal('total', 12, 4)->nullable();
            $table->string('cliente_nombre')->nullable();
            $table->string('cliente_email')->nullable();
            $table->string('cliente_telefono')->nullable();
            $table->string('cliente_direccion')->nullable();
            $table->string('item_nombre')->nullable();
            $table->string('item_codigo')->nullable();
            $table->decimal('item_preciounitario', 12, 4)->nullable();
            $table->integer('item_cantidad')->nullable();
            $table->integer('item_subtotal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maestro');
    }
}
