@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-4">
    <!-- Featured Products Section -->
    <section class="mb-5">
        <h2 class="mb-4">Featured Products</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
                @include('components.product.card', ['product' => $product])
            @endforeach
        </div>
    </section>

    <!-- Categories Section -->
    <section class="mb-5">
        <h2 class="mb-4">Shop by Category</h2>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="{{ route('category', $category->slug) }}" class="btn btn-outline-primary">View Products</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
