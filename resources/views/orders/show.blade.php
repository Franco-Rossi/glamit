@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">Datos de la compra</h5>
        <div class="row">
            <div class="card-body col-6">
                <p>Item comprado: <strong>{{$order->item_nombre}}</strong></p>
                <p>Precio unitario: <strong>${{round($order->item_preciounitario)}}</strong></p>
                <p>Cantidad: <strong>{{$order->item_cantidad}}</strong></p>
                <p>Fecha de creacion: <strong>{{$order->fecha_creacion}}</strong></p>
                <p>Ultima actualizacion: <strong>{{$order->fecha_actualizacion}}</strong></p>
                @if ($order->fecha_factura)
                <p>Fecha de factura: <strong>{{$order->fecha_factura}}</strong></p>
                @endif
            </div>
            <div class="card-body col-6">
                <p>Total de intereses: <strong>${{round($order->intereses)}}</strong></p>
                <p>Subtotal: <strong>${{$order->item_subtotal}}</strong></p>
                @if ($order->costo_envio)
                <p>Costo de envio: <strong>${{round($order->costo_envio)}}</strong></p>
                <p>Total: <strong>${{round($order->total)}}</strong></p>
                <p>Tienda: <strong>{{$order->tienda}}</strong></p>
                <p>Metodo de envio: <strong>{{$order->metodo_envio}}</strong></p>
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Datos del usuario</h5>
        <div class="card-body">
            <p>Nombre: <strong>{{$order->cliente_nombre}}</strong></p>
            <p>Email: <strong>{{$order->cliente_email}}</strong></p>
            <p>Telefono: <strong>{{$order->cliente_telefono}}</strong></p>
            <p>Direccion: <strong>{{$order->cliente_direccion}}</strong></p>
        </div>
    </div>
    
    @switch($order->estado->id)
        @case(App\Estado::ESTADO_PENDIENTE)
        @case(App\Estado::ESTADO_AYUDA)
            <p>Esperando confirmacion de pago</p>
            <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                <button type="submit" name="status" value="{{App\Estado::ESTADO_CANCELADO}}">Cancelar el pedido</button>
            </form>
            @break
        @case(App\Estado::ESTADO_CANCELADO)
            <p class="text-danger">PEDIDO CANCELADO</p>
            @break
        @case(App\Estado::ESTADO_APROBADO)
            <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                <button type="submit" name="status" value="{{App\Estado::ESTADO_PREPARANDO}}">Generar etiqueta de envio</button>
            </form>
            @break
        @case(App\Estado::ESTADO_PREPARANDO)
            <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                <button type="submit" name="status" value="{{App\Estado::ESTADO_DESPACHADO}}">Despachar producto</button>
            </form>
            @break
        @case(App\Estado::ESTADO_DESPACHADO)
            <p class="text-danger">El pedido ya ha sido despachado.</p>
            @break
        @case(App\Estado::ESTADO_ENTREGADO)
            <p class="text-danger">El pedido ya ha sido entregado.</p>
            @break
        @case(App\Estado::ESTADO_RECLAMO)
            <p class="text-danger">Se ha iniciado un reclamo.</p>
            <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                <button type="submit" name="status" value="{{App\Estado::ESTADO_CAMBIO}}">Enviar cambio de paquete</button>
                <button type="submit" name="status" value="{{App\Estado::ESTADO_CAMBIO}}">Enviar devolucion de dinero</button>
            </form>
            @break
        @case(App\Estado::ESTADO_CAMBIO)
            <p class="text-danger">El producto ha sido cambiado.</p>
            @break
        @case(App\Estado::ESTADO_DEVOLUCION)
            <p class="text-danger">Se ha devuelto el dinero al usuario.</p>
            @break
    @endswitch
    
    
    
    
    
</div>



@endsection