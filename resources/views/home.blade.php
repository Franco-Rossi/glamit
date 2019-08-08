@extends('layout')

@section('content')
    <div class="row text-center justify-content-center">
        @foreach ($orders as $order)
            @if ($order->subestado != 'Entregado')
            <div class="col">
                <div class="card">
                    <div class="card-header">{{$order->item_nombre}}</div>
                    <div class="card-body">
                        <h4 class="card-header">{{$order->item_nombre}}</h4>
                        <p class="card-text">{{$order->item_preciounitario}}</p>
                    </div>
                </div>
            </div>
                
            @endif
            
        @endforeach
    </div>




@endsection