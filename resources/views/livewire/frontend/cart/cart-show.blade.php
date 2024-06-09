<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <!-- Encabezado de la tabla del carrito -->
            <h4>Carrito</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        <!-- Encabezado de la tabla del carrito (solo visible en ciertos tamaños de pantalla) -->
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">

                            <!-- Fila del encabezado de la tabla -->
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Producto</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Cantidad</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Talla</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Precio</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4> </h4>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Bucle para mostrar los elementos del carrito -->
                        @forelse ($cart as $cartItem)
                            <!-- Verificar si el elemento del carrito tiene un producto asociado -->
                            @if ($cartItem->product)
                                <div class="cart-item">
                                    <!-- Fila para cada elemento del carrito -->
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            
                                                <label class="product-name">
                                                    <img src="{{asset($cartItem->product->productImages[0]->imagen)}}" style="width: 50px; height: 50px" alt="">
                                                    {{ $cartItem->product->nombre }}
                                                </label>

                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="quantity">{{ $cartItem->cantidad }}</label>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="size">{{ $cartItem->talla }}</label>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">${{ $cartItem->product->precio_venta * $cartItem->cantidad }}MX</label>
                                            @php $totalPrice += $cartItem->product->precio_venta * $cartItem->cantidad @endphp
                                        </div>
                                    
                                        <div>
                                            <!-- Botón para eliminar el producto del carrito utilizando Livewire -->
                                            <div class="remove">
                                                @livewire('eliminar-producto-carrito', ['id' => $cartItem->id])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <!-- Mostrar este mensaje si el carrito está vacío -->
                            <div>No hay productos disponibles</div>
                        @endforelse                                
                    </div>
                </div>
            </div>
            <br/>
            <!-- Botones para continuar comprando y pagar -->
            <div class="row">
                <!-- Botón para ir a las categorías -->
                <div class="col-md-8">
                    <h4>
                        <a class="btn" style=" background-color: #224263; display: block; width: 250px; max-width: 400px; text-align: center; color: white;" href="{{ url('/categorias') }}">Visita Nuestras Categorías</a>
                    </h4>
                </div>
                <div class="col-md-4">
                    <!-- Resumen del precio total y botón para proceder al pago -->
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total:
                            <span>${{ $totalPrice }}MX</span>
                        </h4>
                        <hr>
                        <!-- Botón para proceder al pago -->
                        <a href=" {{ url('/proceso-pago') }}" class="btn w-100" style="background-color: #7e5f00; display: block; width: 150px; max-width: 400px; text-align: center; color: white;">Pagar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function refreshPage() {
        // Esperar 6 segundos (6000 milisegundos) antes de recargar la página
        setTimeout(function() {
            location.reload();
        }, 500); // 6000 milisegundos = 6 segundos
    }
</script> 