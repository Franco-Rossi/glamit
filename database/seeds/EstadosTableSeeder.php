<?php

use \App\Estado;
use Illuminate\Database\Seeder;


class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [ 'estado' => 'Cancelado', 'subestado' => 'Cancelado'],
            [ 'estado' => 'Completo', 'subestado' => 'Despachado'],
            [ 'estado' => 'Completo', 'subestado' => 'Entregado'],
            [ 'estado' => 'Nuevo', 'subestado' => 'Necesito ayuda'],
            [ 'estado' => 'Nuevo', 'subestado' => 'Pendiente'],
            [ 'estado' => 'Procesando', 'subestado' => 'Aprobado'],
            [ 'estado' => 'Procesando', 'subestado' => 'Preparando pedido'],
            [ 'estado' => 'Reclamo', 'subestado' => 'Cambio'],
            [ 'estado' => 'Reclamo', 'subestado' => 'Devolucion'],
            [ 'estado' => 'Reclamo', 'subestado' => 'Pedido']
        ];

        foreach($statuses as $status){
            Estado::create($status);
            }
    }
}
