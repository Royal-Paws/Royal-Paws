<div>

    {{-- Mostrar mensaje de sesión si existe --}}
    <div class="py-3 py-md-4 checkout">
        @if(session()->has('message'))
            <div class="alert alert-danger">
               {{ session('message') }}
            </div>
        @endif

        {{-- Resumen de productos --}}
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <h4>Resumen de Productos</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">
    
                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            </div>
    
                            @php
                                $descripcion = ''; // Inicializa la variable de la descripción
                            @endphp
                        {{-- Iterar sobre los productos en el carrito --}}
                        @forelse ($cart as $cartItem)
                            @if ($cartItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <label class="product-name">
                                                <img src="{{asset($cartItem->product->productImages[0]->imagen)}}" style="width: 50px; height: 50px" alt="">
                                                {{ $cartItem->product->nombre }}
                                            </label>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="quantity">Cantidad: {{ $cartItem->cantidad }}</label>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="size">Talla: {{ $cartItem->talla }}</label>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">Precio: ${{ $cartItem->product->precio_venta * $cartItem->cantidad }}MX</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Concatena la información del producto a la descripción --}}
                                @php
                                    $descripcion .= 'Producto: ' . $cartItem->product->nombre . ' - Cantidad: ' . $cartItem->cantidad . ' - Talla: ' . $cartItem->talla . ' - Precio: $' . ($cartItem->product->precio_venta * $cartItem->cantidad) . 'MX' . "\n";
                                @endphp
                                
                            @endif
                        @empty
                            <div>No hay productos disponibles</div>
                        @endforelse
                        
                        {{-- Muestra la descripción para la nota 
                        <textarea type="text" rows="3" style="width: 500px;"readonly>{{ $descripcion }}</textarea>--}}        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        {{-- Proceso de pago --}}
        <div class="container">
            <h4>Proceso De Pago</h4>    
            <hr>
            @if($this->cantidadTotalProductos !=0)
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Cantidad A Pagar :
                                <span class="float-end">${{$this->cantidadTotalProductos}}</span>
                            </h4>
                            <h4 class="text-primary">
                                Envio :
                                @if($this->cantidadTotalProductos>=599)
                                    <span class="float-end">0</span>                                
                                @else
                                    
                                    <span class="float-end">$65</span> 
                                @endif
                            </h4>
                            <h4 class="text-primary">
                                Total A Pagar :
                                @if($this->cantidadTotalProductos>=599)
                                    <span class="float-end">${{$this->cantidadTotalProductos}}</span>                                
                                @else
                                    
                                    <span class="float-end">${{$this->cantidadTotalProductos + 65}}</span> 
                                @endif
                            </h4>
                            <hr>
                            <small>* ENVÍO GRATIS A DOMICILIO EN PEDIDOS SUPERIORES A 599 MXN Entrega en 1-10 hábiles. Si no llegas al pedido mínimo, ¡no te preocupes! son solo 65 MXN Ten en cuenta que los tiempos de envío pueden variar durante el período de fiestas.</small>
                            <br/>
                            <small>* Dispones de un plazo de 30 días naturales a partir de la fecha en la que recibiste / recogiste tu pedido para solicitar una devolución.</small>
                        </div>
                    </div>

                     {{-- Método de pago --}}
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Información Para La Entrega
                            </h4>
                            <hr>
                            <h5>
                                Para Mayor Comodidad Se Le Enviará A La Dirección de De Su Paypal o De Tarjeta
                            </h5>
                            <hr>
                            <br/>

                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        {{-- Botón para seleccionar método de pago --}}
                                        <h5>Método De Pago: </h5>
                                        <div class="d-md-flex align-items-start">
                                            <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <br/>
                                                {{-- Botón para seleccionar pago en línea --}}
                                                <button class="nav-link fw-bold btn btn-primary" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Pago En Línea</button>
                                            </div>
                                            <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                    <h6>Pago en Línea</h6>
                                                    <hr/>
                                                    {{-- Contenedor para el botón de PayPal --}}
                                                    <div id="paypal-button-container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr/>
                    <br/>
                    {{-- Finalización del pedido --}}
                    <h4>Finalizar el pedido</h4>
                    <hr/>
                    <h6>Sí el pago se realizó éxitosamente el botón para finalizar se habilitará automáticamente es obligatorio que lo pulses</h6>
                    <h6>para continuar con tu pedido, si no lo pulsas y se realizó el cobro comunicate con soporte inmediatamente</h6>
                    
                    <hr/>
                    {{--<span>Nombre usuario: {{$this->id}}</span>--}}

                    {{-- Formulario para enviar información de pedido --}}
                    <form action="{{url('/proceso-pago')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Descripción</label>
                                <span id="descripcion">{{ $descripcion }}</span>
                                <!-- Campo oculto para enviar la descripción -->
                                <input type="hidden" name="descripcion" value="{{ $descripcion }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Precio Total: ($ MXN)</label>
                                <span id="precio_Total">{{ $cantidadTotalProductos }}</span>
                                <!-- Campo oculto para enviar el precio total -->
                                <input type="hidden" name="precio_Total" value="{{ $cantidadTotalProductos }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Nombre:</label>
                                <span id="nombre_cliente" name="nombre_cliente"></span>
                                <!-- Campo oculto para enviar el nombre -->
                                <input type="hidden" name="nombre_cliente" id="nombre_cliente_hidden">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Correo Electrónico</label>
                                <span id="correo" name="correo"></span>
                                <!-- Campo oculto para enviar el correo -->
                                <input type="hidden" name="correo" id="correo_hidden">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Dirección:</label>
                                <span id="domicilio" name="domicilio"></span>
                                <!-- Campo oculto para enviar la dirección -->
                                <input type="hidden" name="domicilio" id="domicilio_hidden">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Estado:</label>
                                <span id="estado" name="estado"></span>
                                <!-- Campo oculto para enviar el estado -->
                                <input type="hidden" name="estado" id="estado_hidden">
                            </div>
                            
                        </div>
                        {{-- Botón para enviar el formulario --}}
                        <button type="submit" wire:click="vaciarCarrito" id="enviarVenta" class="btn btn-success" disabled>Se realizó el cobro satisfactorimente</button>
                    </form>
                </div>
            @else
                <div>
                    <br/>
                    {{-- Mensaje si no hay productos en el carrito --}}
                    <h4>No hay productos en el carrito</h4>
                    <br/>
                    {{-- Botón para volver a las categorías --}}
                    <a href="{{ url('/categorias') }}" class="btn btn-success">Compra ahora</a>
                </div>
            @endif
        </div>
    </div>
</div>








{{--<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID')}}&currency=MXN"></script>--}}
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&currency=MXN&components=buttons,funding-eligibility"></script>

{{-- Programación Para La API de PayPal --}}

<script>

    // Configurar y generar botones de PayPal
    paypal.Buttons({
        // Especificar la fuente de financiamiento (en este caso, tarjeta de crédito)
        fundingSource: paypal.FUNDING.CARD,
        // Estilo de los botones de PayPal
        style: {
            layout: 'vertical',
            color: 'black',
            shape: 'pill',
            label: 'paypal'
        },
        
        // Función para crear una orden de PayPal
        createOrder: function(data, actions){
            // Lógica para crear la orden de compra con el monto total a pagar
            var totalAPagar = <?php echo ($this->cantidadTotalProductos >= 599) ? $this->cantidadTotalProductos : $this->cantidadTotalProductos +65; ?>;
            
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        // Usar el valor recuperado como el monto del pedido
                        value: totalAPagar.toFixed(2) // Asegurarse de que el valor esté en formato correcto
                    }
                }]
            });
        },

        // Manejador de evento para la aprobación de la orden
        onApprove: function(data, actions) {
             // Lógica para procesar la orden una vez aprobada
            return fetch('/paypal/process/' + data.orderID)
                .then(res => res.json())
                .then(function(orderData) {

                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];
                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        // Estado recuperable
                        return actions.restart();
                    }
                    if (errorDetail) {
                        // Errores no recuperables
                        var msg = 'Lo siento, no se pudo procesar su transacción.';
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                        // Mostrar un mensaje de error (intentar evitar las alertas en entornos de producción)
                        // En lugar de alert, considera mostrar el mensaje en el DOM
                        return alert(msg);
                    }
                    // Transacción exitosa
                    //console.log('Resultados', orderData, JSON.stringify(orderData, null, 2));

                    document.getElementById('enviarVenta').disabled = false;
                    var nombre = orderData.payer.name.given_name + ' ' +
                                 orderData.payer.name.surname;
                    document.getElementById('correo').textContent = orderData.payer.email_address;
                    document.getElementById('correo_hidden').value = orderData.payer.email_address;

                    var direccion = orderData.purchase_units[0].shipping.address.address_line_1 + ' ' +
                                    orderData.purchase_units[0].shipping.address.address_line_2 + ', ' +
                                    orderData.purchase_units[0].shipping.address.admin_area_2 + ', ' +
                                    orderData.purchase_units[0].shipping.address.admin_area_1 + ', ' +
                                    orderData.purchase_units[0].shipping.address.postal_code + ', ' +
                                    orderData.purchase_units[0].shipping.address.country_code;

                    document.getElementById('nombre_cliente').textContent =nombre
                    document.getElementById('nombre_cliente_hidden').value =nombre

                    document.getElementById('domicilio').textContent =direccion;
                    document.getElementById('domicilio_hidden').value =direccion;

                    document.getElementById('estado').textContent =' En Proceso De Revisión';
                    document.getElementById('estado_hidden').value =' En Proceso De Revisión';

                    return actions.order.capture();
                })
                .catch(function(error) {
                    console.error('Error procesando la transacción de PayPal:', error);
                    console.log(error); // Agrega este console.log para obtener más información sobre el error
                    alert('Ocurrió un error mientras se procesaba su transacción. Por favor, inténtelo de nuevo más tarde.');
                });
        },
        
        // Manejador de evento para cancelar la transacción
        onCancel: function(data) {
            // Manejar transacción cancelada
            alert("Pago cancelado");
        }


        }).render('#paypal-button-container'); // Renderizar los botones en el contenedor con ID 'paypal-button-container'


</script>
