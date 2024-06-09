@extends('layouts.admin')

@section('content')


<div class="row">
    <!-- Contenedor principal de la fila -->
    <div class="col-md-12">
        <!-- Columna que ocupa todo el ancho en pantallas medianas y mayores -->
        <div class="card">
            <div class="card">
                <div class="card-header" style="background-color: #224263; color: white; text-align: center; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    </br>
                    <h3>Agregar Sliders
                        <a href="{{url('admin/sliders')}}" class="btn float-end" style="background-color: #7e5f00; color: white;">Regresar</a>
                    </h3>  
                </div>
            </div>
            <br/>
            <div class="card-body">
                <!-- Formulario para agregar sliders -->
                <form action="{{url('admin/sliders/crear')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-3">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título del producto">
                        @error('titulo') <small class="text-danger">El titulo es requerido</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion">Descripción:</label>
                        <textarea row="3" name="descripcion" class="form-control" placeholder="Descripción del producto"></textarea>
                        @error('descripcion') <small class="text-danger">La descripción es requerida</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imagen">Imagen:</label>
                        <input type="file" id="imagen" name="imagen" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status:</label>
                        <input type="checkbox" id="status" name="status"/>
                        Marcado=No visible, Desmarcado = Visible
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
