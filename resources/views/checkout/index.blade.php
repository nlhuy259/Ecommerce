@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Shipping Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="shipping_address">Address</label>
                            <input type="text" class="form-control @error('shipping_address') is-invalid @enderror" 
                                id="shipping_address" name="shipping_address" value="{{ old('shipping_address') }}" required>
                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="shipping_city">City</label>
                                    <input type="text" class="form-control @error('shipping_city') is-invalid @enderror" 
                                        id="shipping_city" name="shipping_city" value="{{ old('shipping_city') }}" required>
                                    @error('shipping_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="shipping_state">State</label>
                                    <input type="text" class="form-control @error('shipping_state') is-invalid @enderror" 
                                        id="shipping_state" name="shipping_state" value="{{ old('shipping_state') }}" required>
                                    @error('shipping_state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="shipping_zipcode">Zip Code</label>
                                    <input type="text" class="form-control @error('shipping_zipcode') is-invalid @enderror" 
                                        id="shipping_zipcode" name="shipping_zipcode" value="{{ old('shipping_zipcode') }}" required>
                                    @error('shipping_zipcode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="shipping_country">Country</label>
                                    <input type="text" class="form-control @error('shipping_country') is-invalid @enderror" 
                                        id="shipping_country" name="shipping_country" value="{{ old('shipping_country') }}" required>
                                    @error('shipping_country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label>Payment Method</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                                <label class="form-check-label" for="credit_card">
                                    Credit Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                                <label class="form-check-label" for="paypal">
                                    PayPal
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Order Summary</h4>
                </div>
                <div class="card-body">
                    @foreach($cart as $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                            <span>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>{{ number_format($total, 0, ',', '.') }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 