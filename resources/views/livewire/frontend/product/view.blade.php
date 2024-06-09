<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <!-- Contenedor del contenido -->
            
            <!-- Sección para mostrar un mensaje de alerta -->
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            
            
            <div class="row">
                 <!-- Columna para la imagen del producto -->
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if($product->productImages)
                            <img src="{{ asset($product->productImages[0]->imagen) }}" class="w-100" alt="Img" />
                        @else
                        @endif
                    </div>
                </div>
                <!-- Columna para la información del producto -->
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->nombre}}
                            <label class="label-stock bg-success">Disponible</label>
                        </h4>
                        <hr>
                        <!-- Ruta -->
                        <p class="product-path">
                            Inicio / {{$product->category->nombre}} / {{$product->nombre}}
                        </p>
                        <!-- Precios del producto -->
                        <div>
                            <span class="selling-price">${{$product->precio_venta}}MX</span>
                            <span class="original-price">${{$product->precio_original}}MX</span>
                        </div>
                        <br/>
                        <!-- Sección para seleccionar la talla del producto -->
                        <div class="mt-2">
                            <h5 class="mb-0">Talla</h5><br/>
                            <div>
                                @if($product->talla > 0)
                                    <select wire:model="selectedSize" class="form-control" name="talla" id="talla">
                                        @for($i = 0; $i <= $product->talla; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                @else
                                    <p>No hay tallas disponibles</p>
                                @endif
                                <!-- Mensaje de alerta si no se selecciona una talla -->
                                @if($showAlert)
                                    <div class="alert alert-danger mt-3">
                                        Por favor selecciona una talla antes de añadir al carrito.
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Sección para seleccionar la cantidad del producto -->
                        <div class="mt-2">
                            <br/>
                            <h5 class="mb-0">Cantidad</h5><br/>
                            <div class="input-group">
                                <!-- Botones para aumentar y disminuir la cantidad -->
                                <span class="btn btn1 decrease-quantity" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="number" wire:model="quantity" class="input-quantity form" />
                                <span class="btn btn1 increase-quantity" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <br/>
                         <!-- Botón para añadir el producto al carrito -->
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{ $product->id }})" onclick="refreshPage()"  class="btn form-control" style="background-color: #224263; color: white;">
                                <i class="fa fa-shopping-cart"></i> Añadir al Carrito
                            </button> 
                        </div>
                        <br/>
                        
                    </div>
                </div>
            </div>
            <br/>
            <!-- División en filas para mostrar la descripción del producto, envío y política de devolución -->
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div>
                        <!-- Tarjeta para mostrar la descripción del producto -->
                        <div class="card">
                            <div class="card-header" style="background-color: #224263; color: white;">
                                <h4>Descripción</h4>
                            </div>
                            <div class="card-body">
                                <br/>
                                <p>{{$product->descripcion}}</p>
                                <br/>
                            </div>
                        </div>
                        <br/>
                        <!-- Tarjeta para mostrar la información de envío -->
                        <div class="card">
                            <div class="card-header" style="background-color: #224263; color: white;">
                                <h4 class="mb-0">Envío</h4>
                            </div>
                            <div class="card-body">
                                <br/>
                                <p>ENVÍO GRATIS A DOMICILIO EN PEDIDOS SUPERIORES A 599 MXN
                                    <br/>
                                    Entrega en 1-10 hábiles. Si no llegas al pedido mínimo, ¡no te preocupes! son solo 65 MXN
                                    <br/>
                                    Ten en cuenta que los tiempos de envío pueden variar durante el período de fiestas.
                                </p>
                                <br/>
                            </div>
                        </div>
                        <br/>
                        <!-- Tarjeta para mostrar la política de devolución -->
                        <div class="card">
                            <div class="card-header" style="background-color: #224263; color: white;">
                                <h4 class="mb-0">Devoluciones</h4>
                            </div>
                            <div class="card-body">
                                <br/>
                                <p>Dispones de un plazo de 30 días naturales a partir de la fecha en la que recibiste/recogiste tu pedido para solicitar una devolución.</p>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Columna para mostrar las medidas del producto -->
                <div class="col-md-5 mt-3">
                    <h3>Medidas</h3>
                    <h4>Toma En Cuenta Las Siguientes Medidas</h4>
                    <!-- Imagen que muestra las medidas del producto -->
                    <img src="{{ asset('images/medidas.jpg') }}" alt="Medidas" height="800px" >
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
        }, 1500); // 6000 milisegundos = 6 segundos
    }
</script>