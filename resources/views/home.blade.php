@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card" style="justify-content: center; align-items: center;">
                <!-- Imagen de Bienvenida -->
                <img src="{{ asset('images/bienvenido.png') }}" alt="bienvenida" height="500px" width="500px">
                <!-- Enlace para ver categorías -->
                <a class="btn" style="background-color: #224263; display: block; width: 250px; max-width: 400px; text-align: center; color: white;" href="{{ url('/categorias') }}">Visita Nuestras Categorías</a>
                <br/>
            </div>
        </div>
    </div>    
</div>
@endsection

