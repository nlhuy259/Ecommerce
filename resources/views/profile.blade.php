@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-circle fa-5x mb-3 text-primary"></i>
                    <h4>{{ Auth::user()->name }}</h4>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    
                    @if(Auth::user()->role === 'admin')
                        <div class="admin-actions mb-3">
                            <a href="{{ route('products.create') }}" class="btn btn-success mb-2">
                                <i class="fas fa-plus"></i> Create Product
                            </a>
                            <a href="{{ route('categories.create') }}" class="btn btn-info mb-2">
                                <i class="fas fa-folder-plus"></i> Create Category
                            </a>
                        </div>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Order History</h4>
                </div>
                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                            <td>${{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                <span class="badge badge-{{ $order->status === 'completed' ? 'success' : 'warning' }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('checkout.success', $order->id) }}" class="btn btn-sm btn-primary">
                                                    View Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-shopping-bag fa-3x mb-3 text-muted"></i>
                            <h5>No orders yet</h5>
                            <p class="text-muted">Start shopping to see your orders here.</p>
                            <a href="{{ route('products') }}" class="btn btn-primary mt-2">
                                Browse Products
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 