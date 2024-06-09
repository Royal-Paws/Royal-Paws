@extends('layouts.admin')

@section('content')

<div class="row">
    <!-- Contenedor principal de la fila -->
    <div class="col-md-12">
        <!-- Contenedor que ocupa toda la columna en pantallas medianas y mayores -->
        <div class="card">
            <div class="card">
                <div class="card-header" style="background-color: #224263; color: white; text-align: center; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <!-- Encabezado de la tarjeta con estilo personalizado -->
                    </br>
                    <h3>Editar Producto
                        <a href="{{url('admin/producto')}}" class="btn float-end" style="background-color: #7e5f00; color: white;">Regresar</a>
                    </h3>  
                </div>
            </div>
            <div class="card-body">
                <!-- Cuerpo de la tarjeta que contiene el formulario -->

                @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message')}}</h5>

                @endif

                
                <form action="{{ url('admin/producto/' . $producto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="true">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detalles-tab" data-bs-toggle="tab" data-bs-target="#detalles-tab-pane" type="button" role="tab" aria-controls="detalles-tab-pane" aria-selected="true">
                                Detalles
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="imagen-tab" data-bs-toggle="tab" data-bs-target="#imagen-tab-pane" type="button" role="tab" aria-controls="imagen-tab-pane" aria-selected="true">
                                Imagen del producto
                            </button>
                        </li>
                    </ul>
                
                    <div class="tab-content" id="myTabContent">
                        <!-- Pestaña Home -->
                        <div class="tab-pane fade show active border p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Categoría</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $producto->category_id ? 'selected' : '' }}>
                                            {{ $category->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="text-danger">La categoría es requerida</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control" type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}">
                                @error('nombre') <small class="text-danger">El nombre es requerido</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="urlP">URL:</label>
                                <input class="form-control" type="text" id="urlP" name="urlP" value="{{ $producto->urlP }}">
                                @error('urlP') <small class="text-danger">La URL es requerida</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion_breve">Descripción breve:</label>
                                <textarea class="form-control" id="descripcion_breve" name="descripcion_breve">{{ $producto->descripcion_breve }}</textarea>
                                @error('descripcion_breve') <small class="text-danger">La descripción breve es requerida</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion }}</textarea>
                                @error('descripcion') <small class="text-danger">La descripción es requerida</small> @enderror
                            </div>
                        </div>
                
                        <!-- Pestaña SEO Tags -->
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="meta_titulo">Meta Título:</label>
                                <textarea class="form-control" id="meta_titulo" name="meta_titulo">{{ $producto->meta_titulo }}</textarea>
                                @error('meta_titulo') <small class="text-danger">El meta-título es requerido</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="palabras_clave">Palabras Clave:</label>
                                <textarea class="form-control" id="palabras_clave" name="palabras_clave">{{ $producto->palabras_clave }}</textarea>
                                @error('palabras_clave') <small class="text-danger">Las palabras clave son requeridas</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="meta_descripcion">Meta Descripción:</label>
                                <textarea class="form-control" id="meta_descripcion" name="meta_descripcion">{{ $producto->meta_descripcion }}</textarea>
                                @error('meta_descripcion') <small class="text-danger">La meta-descripción es requerida</small> @enderror
                            </div>
                        </div>
                
                        <!-- Pestaña Detalles -->
                        <div class="tab-pane fade border p-3" id="detalles-tab-pane" role="tabpanel" aria-labelledby="detalles-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="precio_original">Precio original:</label>
                                <input class="form-control" type="number" id="precio_original" name="precio_original" value="{{ $producto->precio_original }}">
                                @error('precio_original') <small class="text-danger">El precio original es requerido</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="precio_venta">Precio de venta:</label>
                                <input class="form-control" type="number" id="precio_venta" name="precio_venta" value="{{ $producto->precio_venta }}">
                                @error('precio_venta') <small class="text-danger">El precio de venta es requerido</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="talla">Talla:</label>
                                <input class="form-control" type="text" id="talla" name="talla" value="{{ $producto->talla }}">
                                @error('talla') <small class="text-danger">La talla es requerida</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status">Estado:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="0" {{ $producto->status == 0 ? 'selected' : '' }}>Disponible</option>
                                    <option value="1" {{ $producto->status == 1 ? 'selected' : '' }}>No disponible</option>
                                </select>
                                @error('status') <small class="text-danger">El estado es requerido</small> @enderror
                            </div>
                        </div>
                
                        <!-- Pestaña Imagen del producto -->
                        <div class="tab-pane fade border p-3" id="imagen-tab-pane" role="tabpanel" aria-labelledby="imagen-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Sube la imagen del Producto</label>
                                <input class="form-control" type="file" name="imagen[]" multiple accept="image/*">
                                @error('imagen') <small class="text-danger">La imagen es requerida</small> @enderror
                            </div>
                            <div>
                                @if($producto->productImages->isNotEmpty())
                                    <div class="row">
                                        @foreach($producto->productImages as $imagen)
                                            <div class="col-md-2">
                                                <img src="{{ asset($imagen->imagen) }}" class="me-4 border" alt="Imagen del producto" style="width:100px; height:100px">
                                                <a href="{{ url('admin/producto-imagen/'.$imagen->id.'/delete') }}" class="d-block">Eliminar</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h5>No hay imágenes agregadas</h5>
                                @endif
                            </div>
                        </div>
                
                        <!-- Botón para enviar el formulario -->
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Aceptar</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>



@endsection
