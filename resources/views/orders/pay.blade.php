@extends('layout')

@section('content')
<div class="container">
    <form method="POST" action="/orders/{{$order->id}}">
        @csrf @method('PATCH')
        <div class="card">
            <h5 class="card-header">Complete el pago de su compra</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                            <label for="tienda">Tienda</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tienda" value="Cordoba" checked>
                            <label class="form-check-label" for="tienda">Cordoba</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tienda" value="Mendoza">
                            <label class="form-check-label" for="tienda">Mendoza</label>
                        </div>
                    </div>
                    <div class="col">
                        <label for="metodo_pago">Metodo de pago</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" value="Credito" checked>
                            <label class="form-check-label" for="tienda">Tarjeta de credito</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" value="Debito">
                            <label class="form-check-label" for="tienda">Tarjeta de debito</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" value="Efectivo">
                            <label class="form-check-label" for="tienda">Efectivo</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                            <label for="metodo_envio">Metodo de envio</label>
                            <select class="form-control" name="metodo_envio">
                                <option value="Moto">Moto</option>
                                <option value="Particular">Particular</option>
                                <option value="Bus">Bus</option>
                            </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-1">
                <h5 class="card-header">Datos de la compra</h5>
                <div class="row">
                    <div class="card-body col-6">
                        <p>Item comprado: <strong>{{$order->item_nombre}}</strong></p>
                        <p>Precio unitario: <strong>${{round($order->item_preciounitario)}}</strong></p>
                        <p>Cantidad: <strong>{{$order->item_cantidad}}</strong></p>
                    </div>
                    <div class="card-body col-6">
                        <p>Total de intereses: <strong>${{round($order->intereses)}}</strong></p>
                        <p>Subtotal: <strong>${{$order->item_subtotal}}</strong></p>
                        <p>Costo de envio: <strong>${{round($order->item_subtotal) * 0.01}}</strong> <small>(1%)</small></p>
                        <p>Total: <strong>${{$order->item_subtotal * 1.01}}</strong></p>
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-secondary btn-block bg-success">Continuar</button>
    </form>
</div>


@endsection