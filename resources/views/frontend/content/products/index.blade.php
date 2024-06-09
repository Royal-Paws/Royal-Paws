@extends('layouts.app')

@section('title')

{{ $category->meta_titulo}}
@endsection


@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Título con el nombre de la categoría -->
                <h4 class="mb-4"> {{ $category->nombre}} </h4>
            </div>
            <!-- Incluir Livewire component -->
            <livewire:frontend.product.index :products="$products" :category="$category"/>
        </div>
    </div>
</div>

@endsection