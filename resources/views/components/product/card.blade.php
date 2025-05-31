<div class="col-md-3 mb-4">
    <div class="card h-100">
        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text text-primary">{{ number_format($product->price, 0, ',', '.') }}</p>

            <div class="mt-auto d-flex justify-content-between align-items-center ">
                <a href="{{ route('products.detail', $product->id) }}" class="btn btn-primary">View Details</a>

                @if(Auth::check() && Auth::user()->role === 'admin')
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
