@extends('layout')

@section('content')

<div class="card">
    <h5 class="card-header">Comprar</h5>
    <div class="card-body">
        <form method="POST" action="/orders/first">
            {{  csrf_field() }}
            <p>Usted esta comprando el articulo {{$item->nombre}}.</p>
            <p>El precio por unidad es de ${{$item->precio}}.</p>
            <p>Cantidad #todo</p>
            <p>Tienda #todo</p>
            <p>Intereses (10%) #todoVue</p>
            <p>Subtotal #todoVue</p>
            
            <p>Por favor, ingrese sus datos para iniciar la compra.</p>
            
            <div class="form-group">
                <label for="cliente_nombre">Nombre</label>
                <input type="text" class="form-control" name='cliente_nombre'>
            </div>
            
            <div class="form-group">
                <label for="cliente_email">Email</label>
                <input type="text" class="form-control" name='cliente_email'>
            </div>
            
            <div class="form-group">
                <label for="cliente_telefono">Telefono</label>
                <input type="text" class="form-control" name='cliente_telefono'>
            </div>
            
            <div class="form-group">
                <label for="cliente_direccion">Direccion</label>
                <input type="text" class="form-control" name='cliente_direccion'>
            </div>
            
            <button type="submit" class="btn btn-secondary btn-lg">Siguiente</button>
        </form>
    </div>
</div>




@endsection