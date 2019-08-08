@extends('layout')

@section('content')

<table>
    <tr>
      <th>Nombre</th>
      <th>Item</th> 
      <th>Cantidad</th>
      <th>SubTotal</th>
      <th>Estado</th>
      <th>Ultima actualizacion</th>
      <th></th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{$order->cliente_nombre}}</td>
        <td>{{$order->item_nombre}}</td> 
        <td>{{$order->item_cantidad}}</td>
        <td>${{$order->item_subtotal}}</td>
        <td>{{$order->estado->estado}} - {{$order->estado->subestado}}</td>
        <td>{{$order->fecha_actualizacion}}</td>
        <td><a href="/orders/{{$order->id}}">Ver compra</a></td> 
      </tr>
    @endforeach

  </table>

@endsection