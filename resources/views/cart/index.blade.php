@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Shopping Cart</h2>

    @if(session('cart'))
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach(session('cart') as $id => $item)
                                        @php $total += $item['price'] * $item['quantity'] @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-thumbnail" style="width: 80px; margin-right: 15px;">
                                                    <span>{{ $item['name'] }}</span>
                                                </div>
                                            </td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}</td>
                                            <td>
                                                <div class="input-group" style="width: 120px;">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="updateCart({{ $id }}, 'decrease')">-</button>
                                                    <input type="text" class="form-control text-center" value="{{ $item['quantity'] }}" readonly>
                                                    <button class="btn btn-outline-secondary" type="button" onclick="updateCart({{ $id }}, 'increase')">+</button>
                                                </div>
                                            </td>
                                            <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" onclick="removeFromCart({{ $id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal</span>
                            <span>{{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>Total</strong>
                            <strong>{{ number_format($total, 0, ',', '.') }}</strong>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart fa-4x mb-3 text-muted"></i>
            <h3>Your cart is empty</h3>
            <p class="text-muted">Add some products to your cart to see them here.</p>
            <a href="{{ route('products') }}" class="btn btn-primary mt-3">
                <i class="fas fa-shopping-bag"></i> Continue Shopping
            </a>
        </div>
    @endif
</div>

@push('scripts')
<script>
function updateCart(productId, action) {
    $.ajax({
        url: '{{ route("cart.update") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            product_id: productId,
            action: action
        },
        success: function(response) {
            if (response.success) {
                location.reload();
            }
        }
    });
}

function removeFromCart(productId) {
    if (confirm('Are you sure you want to remove this item from your cart?')) {
        $.ajax({
            url: '{{ route("cart.remove") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            }
        });
    }
}
</script>
@endpush
@endsection 