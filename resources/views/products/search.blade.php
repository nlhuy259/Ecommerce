@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Search Results for "{{ $query }}"</h2>
    
    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                @include('components.product.card', ['product' => $product])
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(['query' => $query])->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-search fa-4x mb-3 text-muted"></i>
            <h3>No products found</h3>
            <p class="text-muted">Try different keywords or browse our categories.</p>
            <a href="{{ route('products') }}" class="btn btn-primary mt-3">
                Browse All Products
            </a>
        </div>
    @endif
</div>
@endsection 