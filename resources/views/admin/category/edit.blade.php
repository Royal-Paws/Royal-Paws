@extends('layouts.admin')

@section('content')

<div class="row">
    <!-- Contenedor principal de la fila -->
    <div class="col-md-12">
        <!-- Contenedor que ocupa toda la columna en pantallas medianas y mayores -->
        <div class="card">
            <!-- Tarjeta para la presentación del contenido -->
            <div class="card">
                <div class="card-header" style="background-color: #224263; color: white; text-align: center; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <!-- Encabezado de la tarjeta con estilo personalizado -->
                    </br>
                    <h3>Editar Categoría
                        <!-- Botón de regresar -->
                        <a href="{{url('admin/categoria')}}" class="btn float-end" style="background-color: #7e5f00; color: white;">Regresar</a>
                    </h3>
                </div>
            </div> 
            <div class="card-body">
                <!-- Cuerpo de la tarjeta que contiene el formulario -->
                <form action="{{url('admin/categoria/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" value="{{ $category->nombre}}" class="form-control" placeholder="Ingrese el nombre">
                            @error('nombre') <small class="text-danger">El nombre es requerido</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>URL</label>
                            <input type="text" name="urlP" value="{{ $category->urlP}}" class="form-control" placeholder="Ingrese la URL">
                            @error('urlP') <small class="text-danger">La URL es requerida</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Descripción</label>
                            <textarea name="descripcion" rows="2" class="form-control" placeholder="Ingrese la descripción">{{ $category->descripcion}}</textarea>
                            @error('descripcion') <small class="text-danger">La descripción es requerida</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Imagen</label>
                            <input type="file" name="imagen" class="form-control">
                            <img src="{{ asset($category->imagen) }}" width="100px" height="100px">
                            @error('imagen') <small class="text-danger">La imagen es requerida</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Estado (Si esta marcado = No disponible. Si esta desmarcado = Disponible)</label> </br>
                            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':''}}>
                            @error('status') <small class="text-danger">El status es requerida</small>@enderror
                        </div>

                        
                        <div class="col-md-12">
                            </br>
                            <h4>Etiquetas para los motores de búsqueda</h4>
                            </br>
                        </div>
                        
                        
                        <div class="col-md-6 mb-3">
                            <label>Meta-Título</label>
                            <input type="text" name="meta_titulo" value="{{ $category->meta_titulo}}" class="form-control" placeholder="Ingrese el meta-título">
                            @error('meta_titulo') <small class="text-danger">El meta-título es requerido</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Palabra Clave</label>
                            <textarea name="palabras_clave" rows="2" class="form-control" placeholder="Ingrese las palabras clave">{{ $category->palabras_clave}}</textarea>
                            @error('palabras_clave') <small class="text-danger">Las palabras clave son requeridas</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta-Descripción</label>
                            <textarea name="meta_descripcion" rows="2" class="form-control" placeholder="Ingrese la meta-descripción">{{ $category->meta_descripcion}}</textarea>
                            @error('meta_descripcion') <small class="text-danger">La meta-descripción es requerida</small>@enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <!-- Botón para enviar -->
                            <button type="submit" class="btn btn-primary float-end" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection