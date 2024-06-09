@extends('layouts.app')

@section('title','Gracias por su compra')


@section('content')

<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="p-4 shadow bg-white" style="justify-content: center; align-items: center;">
                    <br/>
                    <!-- Imagen Gracias -->
                    <img src="{{ asset('images/gracias.png') }}" alt="bienvenida" height="450px" width="450px">
                    <!-- Enlace para ver categorías -->
                    <a href="{{ url('/categorias')}}" class="btn" style="background-color: #224263; width: 250px; max-width: 400px; color:white"> Visitar Más Productos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
