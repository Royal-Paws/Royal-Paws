@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <!-- Mensaje de sesión para mostrar alertas -->
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card">
                <div class="card-header" style="background-color: #224263; color: white; text-align: center; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h3>Productos
                        <a href="{{url('admin/producto/crear')}}" class="btn float-end" style="background-color: #7e5f00; color: white;">Agregar Productos</a>
                    </h3>
                </div>
            </div>
            <!-- Contenedor para hacer la tabla responsive -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Bucle para iterar sobre los productos -->
                        @forelse($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>
                                @if($producto->category)
                                    {{ $producto->category->nombre }}
                                @else
                                    No hay categoría
                                @endif
                            </td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->status == 1 ? 'No disponible' : 'Disponible' }}</td>
                            <td>
                                <!-- Botón para actualizar el producto -->
                                <a href="{{url('/admin/producto/'.$producto->id.'/editar')}}" class="btn btn-success" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Actualizar</a>
                                 <!-- Botón para eliminar el producto -->
                                <a href="{{url('admin/producto/'.$producto->id.'/delete')}}" onclick="return confirm('¿Estás seguro de querer eliminar la imagen?')" class="btn btn-danger" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Eliminar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <!-- Mensaje cuando no hay productos -->
                            <td colspan="5">No hay productos disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 
@endsection
