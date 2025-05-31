@extends('layouts.app')

@section('content')
    <h1>All Products</h1>
    <div class="row">
    @foreach($products as $product)
        @include('components.product.card', ['product' => $product])
    @endforeach
</div>
@endsection
