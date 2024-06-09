@extends('layouts.admin')

@section('content')

<div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <!-- Columna con margen adicional -->
      <!-- Flexbox con justificación y envoltura de elementos -->
      <div class="d-flex justify-content-between flex-wrap">
        <!-- Flexbox con alineación y envoltura de elementos -->
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            @if(@session('message'))
            <!-- Comprobación de mensaje de sesión -->
            <h2>{{session('message')}}</h2>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container" style="display: flex; justify-content: center; align-items: center;">
    <div style="display: flex; flex-direction: column; align-items: center; background: white; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); max-width: 800px; text-align: center; border-radius: 10px;">
      <div style="margin-bottom: 20px;">
        <!-- Imagen del logo -->
        <img src="{{ asset('images/logo.png') }}" alt="logo">
      </div>
      <div>
        <!-- Eslogan -->
        <img src="{{ asset('images/eslogan.png') }}" alt="eslogan">
      </div>
    </div>
  </div>

  <br/>
  <br/>
  <div class="container" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
    <div >
      <div style="display: flex; flex-direction: column; align-items: center; background: white; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center; border-radius: 10px;">
        <div style="margin-bottom: 20px;">
          <!-- Imagen del logo -->
          <img src="{{ asset('images/logo_icon.png') }}" alt="logo" style="width: 50%; max-width: 150px;">
        </div>
        <div style="margin-bottom: 20px;">
          <!-- Enlace para ver ventas -->
          <a href="{{ url('/admin/compras') }}" style="display: block; width: 200px; text-align: center; text-decoration: none; color: white; background-color: #7E5F00; padding: 10px 20px; border-radius: 5px;">Ver Ventas</a>
        </div>
      </div>
    </div>
    <div >
      <div style="display: flex; flex-direction: column; align-items: center; background: white; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center; border-radius: 10px;">
        <div style="margin-bottom: 20px;">
          <!-- Imagen del logo -->
          <img src="{{ asset('images/logo_icon.png') }}" alt="logo" style="width: 50%; max-width: 150px;">
        </div>
        <div style="margin-bottom: 20px;">
          <!-- Enlace para ver categorías -->
          <a href="{{ url('/admin/categoria') }}" style="display: block; width: 200px; text-align: center; text-decoration: none; color: white; background-color: #7E5F00; padding: 10px 20px; border-radius: 5px;">Ver Categorías</a>
        </div>
      </div>
    </div>
    <div >
      <div style="display: flex; flex-direction: column; align-items: center; background: white; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center; border-radius: 10px;">
        <div style="margin-bottom: 20px;">
          <!-- Imagen del logo -->
          <img src="{{ asset('images/logo_icon.png') }}" alt="logo" style="width: 50%; max-width: 150px;">
        </div>
        <div style="margin-bottom: 20px;">
          <!-- Enlace para ver productos -->
          <a href="{{ url('/admin/producto') }}" style="display: block; width: 200px; text-align: center; text-decoration: none; color: white; background-color: #7E5F00; padding: 10px 20px; border-radius: 5px;">Ver Productos</a>
        </div>
      </div>
    </div>
    <div >
      <div style="display: flex; flex-direction: column; align-items: center; background: white; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center; border-radius: 10px;">
        <div style="margin-bottom: 20px;">
          <!-- Imagen del logo -->
          <img src="{{ asset('images/logo_icon.png') }}" alt="logo" style="width: 50%; max-width: 150px;">
        </div>
        <div style="margin-bottom: 20px;">
          <!-- Enlace para ver sliders -->
          <a href="{{ url('/admin/sliders') }}" style="display: block; width: 200px; text-align: center; text-decoration: none; color: white; background-color: #7E5F00; padding: 10px 20px; border-radius: 5px;">Ver Sliders</a>
        </div>
      </div>
    </div>
  </div>
</div>
 
@endsection