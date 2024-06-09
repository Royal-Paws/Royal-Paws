@extends('layouts.app')

@section('title','Categorias - Royal Paws')


@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Categorías</h4>
            </div>
            <!-- Bucle de categorías -->
            @forelse ($categories as $categoryItem)
            <!-- Columna (para dispositivos pequeños y medianos) -->
            <div class="col-6 col-md-3">
                <div class="category-card" style="background: white; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
                    <a href="{{ url('/categorias/'.$categoryItem->urlP) }}" style="text-decoration: none; color: black;">
                        <div class="category-card-img" style="overflow: hidden; border-bottom: 10px solid white;">
                             <!-- Imagen de la categoría -->
                            <img src="{{ asset("$categoryItem->imagen") }}" alt="Imagen-Categoria" style="width: 100%; height: auto;">
                        </div>
                        <div style="padding: 10px 0;">
                            <!-- Contenido de la categoría -->
                            <h5 style="margin: 0;">{{ $categoryItem->nombre }}</h5>
                        </div>
                    </a>
                </div>
                
            </div>
            @empty
            <!-- Bucle de categorías vacío -->
                <div class = "col-md-12">
                    <h5>No Hay Categorías Disponibles</h5>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection