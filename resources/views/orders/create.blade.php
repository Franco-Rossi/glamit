@extends('layout')

@section('content')
<div class="container">
    <form method="POST" action="/admin/productos" enctype="multipart/form-data">
        {{  csrf_field() }}
        <div class="card">
            <h5 class="card-header">Comprar un producto</h5>
            <div class="card-body">
                <select class="form-control">
                    @foreach ($items as $item)
                <option>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Ingrese sus datos</h5>
            <div class="card-body">
                
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Ingrese su nombre">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Ingrese su email">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Ingrese su numero de telefono">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Ingrese su direccion">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary btn-lg">Agregar producto</button>
    </form>
</div>



@endsection