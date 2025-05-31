@extends('layouts.app')

@section('title', 'Order Confirmation')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-check-circle text-success fa-4x mb-3"></i>
                    <h2 class="mb-4">Order Confirmed!</h2>
                    <p class="lead">Thank you for your purchase. Your order has been received.</p>
                    <p>Order #{{ $order->id }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-0">Order Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Shipping Information</h5>
                            <p>
                                {{ $order->shipping_address }}<br>
                                {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zipcode }}<br>
                                {{ $order->shipping_country }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h5>Payment Information</h5>
                            <p>
                                Payment Method: {{ ucfirst($order->payment_method) }}<br>
                                Payment Status: {{ ucfirst($order->payment_status) }}<br>
                                Order Status: {{ ucfirst($order->status) }}
                            </p>
                        </div>
                    </div>

                    <h5>Order Items</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                                    <td><strong>{{ number_format($order->total_amount, 0, ',', '.') }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
@endsection 