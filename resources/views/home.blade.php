@extends('layout')

@section('content')
<div class="row text-center justify-content-center">
    @foreach ($orders as $order)
    
    <div class="col-4">
        <div class="card">
            <div class="card-header">{{$order->item_nombre}}</div>
            <div class="card-body">
                <strong class="bg-info rounded-pill px-4 text-white">{{$order->estado->estado}}</strong>
                <h4 class="card-title">{{$order->item_cantidad}} unidades</h4>
                
                @switch($order->estado->id)
                @case(App\Estado::ESTADO_PENDIENTE)
                <button type="submit">Confirmar pago</button>
                <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                    <button type="submit" name="status" value="{{App\Estado::ESTADO_CANCELADO}}">Cancelar pedido</button>
                    <button type="submit" name="status" value="{{App\Estado::ESTADO_AYUDA}}">Necesito ayuda</button>
                </form>
                @break
                @case(App\Estado::ESTADO_AYUDA)
                <button type="submit">Confirmar pago</button>
                <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                    <button type="submit" name="status" value="{{App\Estado::ESTADO_CANCELADO}}">Cancelar pedido</button>
                </form>
                @break
                @case(App\Estado::ESTADO_CANCELADO)
                <p class="text-danger">PEDIDO CANCELADO</p>
                @break
                @case(App\Estado::ESTADO_APROBADO)
                <p class="text-danger">El pedido esta siendo preparado.</p>
                <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                    <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}">Hacer un reclamo</button>
                </form>
                @break
                @case(App\Estado::ESTADO_PREPARANDO)
                <p class="text-danger">El pedido esta siendo despachado.</p>
                <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                    <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}">Hacer un reclamo</button>
                </form>
                @break
                @case(App\Estado::ESTADO_DESPACHADO)
                <p class="text-danger">El pedido ya ha sido despachado.</p>
                <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                    <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}">Hacer un reclamo</button>
                </form>
                @break
                @case(App\Estado::ESTADO_ENTREGADO)
                <p class="text-danger">El pedido ya ha sido entregado.</p>
                <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                    <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}">Hacer un reclamo</button>
                </form>
                @break
                @case(App\Estado::ESTADO_RECLAMO)
                <p class="text-danger">Se ha iniciado un reclamo.</p>
                @break
                @case(App\Estado::ESTADO_CAMBIO)
                <p class="text-danger">Se está tramitando el cambio del producto.</p>
                @break
                @case(App\Estado::ESTADO_DEVOLUCION)
                <p class="text-danger">Se está tramitando la devolucion del producto.</p>
                @break
                @default
                
                @endswitch
                
            </div>
        </div>
    </div>
    @endforeach
</div>




@endsection