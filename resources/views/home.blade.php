@extends('layout')

@section('content')
    <div class="row text-center justify-content-center">
        @foreach ($items as $item)
        <div class="card col-sm-7 col-lg-4">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">{{$item->nombre}}</h4>
                <p class="card-text">${{$item->precio}}</p>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Comprar</a>
            </div>
        </div>
        @endforeach
    </div>




@endsection