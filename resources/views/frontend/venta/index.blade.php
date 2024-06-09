@extends('layouts.app')

@section('title', 'Compras - Royale Paws')

@section('content')

<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4>Compras</h4>
            <div class="row">
                <div class="col-12">
                    <div class="shopping-cart">
                        <!-- Cabecera visible solo en pantallas medianas y grandes -->
                        <div class="cart-header d-none d-md-block">
                            <div class="row">
                                
                                </div>
                            </div>
                        </div>
                        <br/>

                        <!-- Elementos de la lista de compras -->
                        @forelse ($ventas as $ventaItem)
                            @if ($ventaItem['usuario_ID'] === Auth::id())
                                <div class="cart-item mb-3">
                                    <div class="row">
                                        <div class="col-6 col-md-1 my-auto">
                                            <label class="h5 text-muted">ID:</label>
                                            <span class="h6 text-muted">{{ $ventaItem['id'] }}</span>
                                        </div>
                                        <div class="col-6 col-md-3 my-auto">
                                            <label class="h5 text-muted">Precio Total:</label>
                                            <span class="h6 text-muted">${{ $ventaItem['precio_Total'] }} MXN</span>
                                        </div>
                                        <div class="col-6 col-md-4 my-auto">
                                            <label class="h5 text-muted">Dirección:</label>
                                            <span class="h6 text-muted">{{ $ventaItem['direccion'] }}</span>
                                        </div>
                                        <div class="col-6 col-md-3 my-auto">
                                            <label class="h5 text-muted">Estado:</label>
                                            <span class="h6 text-muted">{{ $ventaItem['estado'] }}</span>
                                        </div>
                                        <div>
                                            <br/>
                                            <div class="my-auto">
                                                <label class="h5 text-muted">Descripción:</label>
                                                <span class="h6 text-muted">{{ $ventaItem['descripcion'] }}</span>
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endif
                        @empty
                            <div class="col-12">
                                <h5>No Hay Compras Disponibles</h5>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<hr/>
<br/>
<div class="row">
    <div class="col-12 text-center">
        <h4>
            <!-- Enlace para ver categorías -->
            <a class="btn" style="background-color: #224263; width: 250px; max-width: 400px; color:white"href="{{ url('/categorias') }}">Visita Nuestras Categorías</a>
        </h4>
    </div>
</div>
<br/>
<br/>

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