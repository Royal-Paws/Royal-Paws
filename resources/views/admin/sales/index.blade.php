@extends('layouts.admin')

@section('content')
 <!-- Contenedor principal de la fila -->
<div class="row">
    <!-- Columna de 12 unidades de ancho (completa) -->
    <div class="col-md-12">
        <!-- Mensaje de sesión -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Tarjeta -->
        <div class="card">
            <div class="card-header" style="background-color: #224263; color: white; text-align: center; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h3>Ventas</h3>
            </div>
        </div>
    </div>
</div>
<br/>

<!-- Sección de ventas -->
<div>
    <!-- Contenedor con padding vertical y fondo claro -->
    <div class="py-3 py-md-5 bg-light">
        <!-- Contenedor Bootstrap -->
        <div class="container">
            <!-- Fila -->
            <div class="row">
                <!-- Columna de 12 unidades de ancho (completa) -->
                <div class="col-md-12">
                    <!-- Carrito de compras -->
                    <div class="shopping-cart">
                        <!-- Encabezado del carrito (oculto en pantallas pequeñas) -->
                        <!--<div class="cart-header d-none d-md-block">
                            <div class="row">
                                
                                <div class="col-md-2">
                                    <h4 class="h4">ID-Compra</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="h4">Descripción</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="h4">Precio Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="h4">Titular</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="h4">E-mail PayPal</h4>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <hr/>-->

                        <!-- Iteración de ventas -->
                        @forelse ($ventas as $ventaItem)
                            
                                <div class="cart-item mb-3">
                                    <!-- Fila de datos de venta -->
                                    <div class="row">
                                        <div class="col-6 col-md-1 my-auto">
                                            <label class="h5 text-muted">ID:</label>
                                            <span class="h6 text-muted">{{ $ventaItem['id'] }}</span>
                                        </div>
                                        <div class="col-6 col-md-3 my-auto">
                                            <label class="h5 text-muted">Precio Total:</label>
                                            <span class="h6 text-muted">${{ $ventaItem['precio_Total'] }} MXN</span>
                                        </div>
                                        <div class="col-6 col-md-2 my-auto">
                                            <label class="h5 text-muted">Titular:</label>
                                            <span class="h6 text-muted">{{ $ventaItem['nombre_pago'] }}</span>
                                        </div>
                                        <div class="col-12 col-md-4 my-auto">
                                            <label class="h5 text-muted">E-mail PayPal:</label>
                                            <span class="h6 text-muted">{{ $ventaItem['email_pago'] }}</span>
                                        </div>

                                        <!-- Formulario para actualizar dirección y estado -->
                                        <div class="col-12">
                                            <br/>
                                            <div class="my-auto">
                                                <label class="h5 text-muted">Descripción:</label>
                                                <span class="h6 text-muted">{{ $ventaItem['descripcion'] }}</span>
                                            </div>
                                            <br/>
                                            <form action="{{ url('admin/compras/'.$ventaItem['id']) }}" method="POST" enctype="multipart/form-data" class="w-100">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label class="form-control">Domicilio:</label>
                                                    <input class="h5 text-muted form-control" name="direccion" value="{{ $ventaItem['direccion'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-control">Estado:</label>
                                                    <input class="h5 text-muted form-control" name="estado" value="{{ $ventaItem['estado'] }}">
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button type="submit" class="btn btn-success" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Actualizar</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Formulario para eliminar la venta -->
                                        <div class="col-12 text-center">
                                            <form action="{{ url('admin/compras/' . $ventaItem['id']) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar esta venta?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr/>
                                </div>
                            
                        @empty
                            <div class="col-12">
                                <!-- Mensaje de no hay compras disponibles -->
                                <h5>No Hay Compras Disponibles</h5>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cart-item {
        margin-bottom: 1rem;
    }

    .cart-item label {
        font-weight: bold;
    }

    .cart-item span {
        display: block;
    }

    @media (min-width: 768px) {
        .cart-item label, .cart-item span {
            display: inline;
        }
    }
</style>

@endsection