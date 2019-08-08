@extends('layout')

@section('content')
    <div class="row text-center justify-content-center">
        @foreach ($orders as $order)
            
            <div class="col">
                <div class="card">
                        <div class="card-header">{{$order->item_nombre}}</div>
                    <div class="card-body">
                        <h4 class="card-title">{{$order->item_cantidad}} unidades</h4>
                        @switch($order->subestado)
                            @case('Pendiente')
                                <p>hola</p>
                                @break
                            @case('Cancelado')
                                <p>chau</p>
                                @break
                            @default
                                
                        @endswitch
                    </div>
                </div>
            </div>
        @endforeach
    </div>




@endsection