<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>¿Esta ústed seguro de que quiere eliminar esta categoría?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancelar</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Sí, Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <!-- Tarjeta -->
            <div class="card">
                <div class="card-header" style="background-color: #224263; color: white; text-align: center; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h3>Categorías
                        <a href="{{url('admin/categoria/crear')}}" class="btn float-end" style="background-color: #7e5f00; color: white;">Agregar Categoría</a>
                    </h3>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <!-- Tabla -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Status</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->nombre}}</td>
                                    <td>{{$category->status =='1' ? 'No visible':'Visible'}}</td>
                                    <td>
                                        <a href="{{url('admin/categoria/'.$category->id.'/editar')}}" class="btn btn-success" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Editar</a>
                                        <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger" style="display: block; width: 150px; max-width: 200px; text-align: center; color: white;">Eliminar</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                <div>
                    {{$categories->links()}}
                </div>
                </div>
            </div>
            <div class="card"></div>
        </div>
    </div>
</div>

@push('script')

<script>
    /*
    window.addEventListener('close-modal', event => {
        
        $('#deleteModal').modal('hide');

    });
    */
</script>

@endpush
