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
        <button type="submit" class="btn btn-secondary btn-lg">Continuar</button>
    </form>
</div>


@endsection