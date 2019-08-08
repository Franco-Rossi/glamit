@extends('layout')

@section('content')
<div class="row text-center justify-content-center">
    @foreach ($orders as $order)
    
    <div class="col-4">
        <div class="card">
            <div class="card-header">{{$order->item_nombre}}</div>
            <div class="card-body">
                <p class="bg-info rounded-pill text-white"><strong>{{$order->estado->estado}}</strong> - {{$order->estado->subestado}}</p>
                <h4 class="card-title">{{$order->item_cantidad}} unidades</h4>
                
                @switch($order->estado->id)
                    @case(App\Estado::ESTADO_PENDIENTE)
                        <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                            <a name="" id="" class="btn btn-primary" href="/orders/pay/{{$order->id}}" role="button">Confirmar pago</a>
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_CANCELADO}}">Cancelar pedido</button>
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_AYUDA}}">Necesito ayuda</button>
                        </form>
                        @break
                    @case(App\Estado::ESTADO_AYUDA)
                        <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                            <a name="" id="" class="btn btn-primary" href="/orders/pay/{{$order->id}}" role="button">Confirmar pago</a>
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_CANCELADO}}" class="btn btn-secondary">Cancelar pedido</button>
                        </form>
                        @break
                    @case(App\Estado::ESTADO_CANCELADO)
                        <p class="text-danger">PEDIDO CANCELADO</p>
                        @break
                    @case(App\Estado::ESTADO_APROBADO)
                        <p class="text-success">El pedido esta siendo preparado.</p>
                        <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}" class="btn btn-danger">Hacer un reclamo</button>
                        </form>
                        @break
                    @case(App\Estado::ESTADO_PREPARANDO)
                        <p class="text-success">El pedido esta siendo despachado.</p>
                        <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}" class="btn btn-danger">Hacer un reclamo</button>
                        </form>
                        @break
                    @case(App\Estado::ESTADO_DESPACHADO)
                        <p class="text-success">El pedido ya ha sido despachado.</p>
                        <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}" class="btn btn-danger">Hacer un reclamo</button>
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_ENTREGADO}}" class="btn btn-success">Ya recibí mi producto</button>
                        </form>
                        @break
                    @case(App\Estado::ESTADO_ENTREGADO)
                        <p class="text-success">El pedido ya ha sido entregado.</p>
                        <form action="/orders/{{$order->id}}/status" method="POST"> @method('PATCH') @csrf  
                            <button type="submit" name="status" value="{{App\Estado::ESTADO_RECLAMO}}" class="btn btn-danger">Hacer un reclamo</button>
                        </form>
                        @break
                    @case(App\Estado::ESTADO_RECLAMO)
                        <p class="text-danger">Se ha iniciado un reclamo.</p>
                        @break
                    @case(App\Estado::ESTADO_CAMBIO)
                        <p class="text-danger">Se está tramitando el cambio del producto.</p>
                        @break
                    @case(App\Estado::ESTADO_DEVOLUCION)
                        <p class="text-danger">El dinero ha sido devuelto por el vendedor.</p>
                        @break
                @endswitch
                
            </div>
        </div>
    </div>
    @endforeach
</div>




@endsection