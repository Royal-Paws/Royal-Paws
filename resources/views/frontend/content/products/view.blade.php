@extends('layouts.app')

@section('title')

{{ $category->meta_titulo}}
@endsection


@section('content')
<div>
    <livewire:frontend.product.view :product="$product" :category="$category" />
</div>
@endsection