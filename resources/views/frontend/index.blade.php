@extends('layouts.app')

@section('title','Royal Paws')


@section('content')

<!-- Contenedor de las imágenes del carrusel -->
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Iteración sobre los sliders -->
      @foreach ($sliders as $key => $sliderItem)
        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
          <!-- Imagen del slider -->
          <img src="{{ asset($sliderItem->imagen)}}" class="d-block w-100" alt="...">
          <!--<div class="carousel-caption d-flex align-items-center justify-content-start">
                <div>
                    <h5 class="text-white fs-4">$sliderItem->titulo}}</h5>  Título blanco y más grande 
                    <p class="text-dark fs-5">$sliderItem->descripcion}}</p>  Descripción negra y más grande 
                </div>
              </div>-->
        </div>
      @endforeach
    </div>
    
    
    <!-- Botones de control del carrusel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <!-- Ícono de flecha izquierda -->
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <!-- Etiqueta visualmente oculta -->
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <!-- Ícono de flecha derecha -->
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <!-- Etiqueta visualmente oculta -->
      <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container" style="display: flex; justify-content: center; align-items: center;">
  <div style="display: flex; flex-direction: column; align-items: center; background: white; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); max-width: 300px; text-align: center; border-radius: 10px;">
    <div style="margin-bottom: 20px;">
      <!-- Logo -->
      <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 100%; max-width: 250px;">
    </div>
    <div style="margin-bottom: 20px;">
      <!-- Botón para conocer productos -->
      <a href="{{ url('/categorias') }}" style="text-decoration: none; color: white; background-color: #7E5F00; padding: 10px 20px; border-radius: 5px;">Conoce Nuestros Productos</a>
    </div>
    <!--<div>
      <img src="{{ asset('images/eslogan.png') }}" alt="eslogan" style="width: 100%; max-width: 250px;">
    </div>-->
  </div>
</div>

@endsection

<style>
    .carousel-item img {
        width: 50%;
        height: auto; /* Para mantener la proporción de la imagen */
    }
</style>