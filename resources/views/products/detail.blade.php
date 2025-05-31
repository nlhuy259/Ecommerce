@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="max-height: 500px; object-fit: contain;">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $product->name }}</h1>
                    <p class="text-muted">Danh mục: {{ $product->category->name }}</p>
                    
                    <div class="price-section mb-4">
                        <h2 class="text-primary">{{ number_format($product->price, 0, ',', '.') }} VNĐ</h2>
                    </div>

                    <div class="description mb-4">
                        <h5>Mô tả</h5>
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="quantity-section mb-4">
                        <h5>Quantity</h5>
                        <div class="input-group" style="width: 150px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity()">-</button>
                            </div>
                            <input type="number" class="form-control text-center" id="quantity" value="1" min="1" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity()">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" id="cart_quantity" value="1">
                            <button type="submit" class="btn btn-primary btn-lg mr-2">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>
                        
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-edit"></i> Edit Product
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let quantity = 1;
const quantityInput = document.getElementById('quantity');
const cartQuantityInput = document.getElementById('cart_quantity');

function increaseQuantity() {
    quantity++;
    updateQuantity();
}

function decreaseQuantity() {
    if (quantity > 1) {
        quantity--;
        updateQuantity();
    }
}

function updateQuantity() {
    quantityInput.value = quantity;
    cartQuantityInput.value = quantity;
}
</script>
@endpush
@endsection
