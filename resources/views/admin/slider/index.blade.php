@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Columna que ocupa todo el ancho en pantallas medianas y mayores -->
        @if(session('message'))
            <!-- Comprobación de mensaje de sesión -->
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card">
                <div class="card-header" style="background-color: #224263; color: white; text-align: center; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h3>Sliders
                        <a href="{{url('admin/sliders/crear')}}" class="btn float-end" style="background-color: #7e5f00; color: white;">Agregar Sliders</a>
                    </h3>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Contenedor para hacer la tabla responsive -->
                <table class="table table-bordered">
                    <!-- Tabla con bordes -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Bucle para iterar sobre los sliders -->
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->titulo }}</td>
                                <td>{{ $slider->descripcion }}</td>
                                <td>
                                    <img src="{{ asset("$slider->imagen")}}" alt="Slider" />
                                </td>
                                <td>{{ $slider->status == '0' ? 'Visible':'No visible'}}</td>
                                <td>
                                     <!-- Enlaces para editar y eliminar el slider -->
                                    <a href="{{url('admin/sliders/'.$slider->id.'/editar')}}" class="btn btn-success" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Editar</a>
                                    <a href="{{url('admin/sliders/'.$slider->id.'/eliminar')}}" 
                                        onclick="return confirm('¿Estás seguro de querer eliminar este slider?')"
                                        class="btn btn-danger" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;"
                                        >Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 
@endsection
