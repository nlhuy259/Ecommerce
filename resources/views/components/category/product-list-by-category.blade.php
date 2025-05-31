<h1>Products in "{{ $category->name }}"</h1>

    <div class="row">
        @forelse ($products as $product)
            @include('components.product.card', ['product' => $product])
        @empty
            <p>No products found in this category.</p>
        @endforelse
    </div>