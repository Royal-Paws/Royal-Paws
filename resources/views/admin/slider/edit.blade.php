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
                    <h3>Editar Slider
                        <a href="{{url('admin/sliders/')}}"  class="btn float-end" style="background-color: #7e5f00; color: white;">Regresar</a>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <!-- Cuerpo de la tarjeta -->
                @if ($errors->any())
                    <!-- Comprobación de errores -->
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif
            </div>
            <div>
                <!-- Formulario para editar sliders -->
                <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="mb-3">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" value="{{ $slider->titulo}}" name="titulo" class="form-control"/>
                        @error('titulo') <small class="text-danger">El titulo es requerido</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion">Descripción:</label>
                        <textarea row="3" name="descripcion" class="form-control"> {{ $slider->descripcion}} </textarea>
                        @error('descripcion') <small class="text-danger">La descripción es requerida</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imagen">Imagen:</label>
                        <input type="file" id="imagen" name="imagen" class="form-control"/>
                        <img src="{{asset("$slider->imagen")}}" style="width: 450px; heigth: 450px" alt="Slider"/>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status:</label>
                        <input type="checkbox" id="status" name="status" {{$slider->status == '1' ? 'Activado':''}} />
                        Marcado=No visible, Desmarcado = Visible
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"  style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
