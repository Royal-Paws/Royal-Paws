<div>
    <div class="row">
        <!-- Bucle que recorre cada producto en la lista $products -->
        @forelse ($products as $productItem)
        <div class="col-md-3">

            <!-- Tarjeta de producto -->
            <div class="product-card" style="position: relative; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="product-card-img" style="position: relative; overflow: hidden; border-radius: 10px;">
                    <!-- Etiqueta para indicar si el producto está disponible o no -->
                    @if ($productItem->status == 0)
                    <label class="stock bg-success" style="position: absolute; top: 10px; left: 10px; padding: 5px 10px; color: white; border-radius: 5px;">Disponible</label>
                    @else
                    <label class="stock bg-danger" style="position: absolute; top: 10px; left: 10px; padding: 5px 10px; color: white; border-radius: 5px;">No Disponible</label>
                    @endif

                    <!-- Enlace a la página del producto -->
                    @if($productItem->productImages->count()>0)
                    <a href="{{url('/categorias/'.$productItem->category->urlP.'/'.$productItem->urlP) }}">
                        <img src="{{ asset($productItem->productImages[0]->imagen)}}" alt="{{$productItem->nombre}}" style="width: 100%; height: auto; border-radius: 10px; transition: transform 0.3s ease;">
                    </a>
                    @endif
                </div>

                <!-- Cuerpo de la tarjeta de producto -->
                <div class="product-card-body" style="margin-top: 10px;">
                    <h5 class="product-name" style="margin-bottom: 0;">
                       <a href="{{url('/categorias/'.$productItem->category->urlP.'/'.$productItem->urlP) }}" style="color: #224263; text-decoration: none;">{{$productItem->nombre}}</a>
                    </h5>
                    <div>
                        <span class="selling-price" style="font-weight: bold;">${{$productItem->precio_venta}} MX</span>
                        <span class="original-price" style="text-decoration: line-through; color: #999;">${{$productItem->precio_original}} MX</span>
                    </div>
                </div>
                <!-- Botón para mostrar información adicional del producto utilizando Livewire -->
                <div class="text-center" style="margin-top: 20px;">
                    @livewire('mostrar-informacion-producto', ['id' => $productItem->id])
                </div>
                <br/>
            </div>
        </div>
        <!-- Si no hay productos disponibles -->
        @empty
        <div class="col-md-12">
            <div class="p-2">
                <h4>No hay productos disponibles para {{ $category->nombre}}</h4>
            </div>
        </div> 
        @endforelse
    </div>
</div>
