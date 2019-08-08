@extends('layout')

@section('content')
<div class="container">
    <form method="POST" action="/orders/buy">
        {{  csrf_field() }}
        <div class="card">
            <h5 class="card-header">Comprar un producto</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="item_codigo">Producto</label>
                        <select class="form-control" name="item_codigo">
                            @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}} - ${{round($item->price)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="item_cantidad">Cantidad</label>
                        <select class="form-control" name="item_cantidad">
                            @for ($i = 1; $i < 6; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <small>Todas las compras poseen un 5% de impuestos agregados al total de la transaccion.</small>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Ingrese sus datos</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="cliente_nombre">Nombre</label>
                        <input type="text" class="form-control" name="cliente_nombre" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="col">
                        <label for="cliente_email">Email</label>
                        <input type="email" class="form-control" name="cliente_email" placeholder="Ingrese su email" required>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col">
                        <label for="cliente_telefono">Telefono</label>
                        <input type="text" class="form-control" name="cliente_telefono" placeholder="Ingrese su numero de telefono" required>
                    </div>
                    <div class="col">
                        <label for="cliente_direccion">Direccion</label>
                        <input type="text" class="form-control" name="cliente_direccion" placeholder="Ingrese su direccion" required>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary btn-lg">Continuar</button>
    </form>
</div>



@endsection