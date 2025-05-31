@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container my-4"> 
        {{-- Product Listing --}}
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>{{ $category->name }}</h3>
        
            <form method="GET" class="form-inline">
                <label for="sort" class="me-2 ">Sắp xếp theo</label>
                <select name="sort" id="sort" class="form-select ml-2" onchange="this.form.submit()">
                    <option value="">-- Chọn --</option>
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến cao</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao đến thấp</option>
                </select>
            </form>
        </div>
        
			<div class="row">
            @if($products->count())
                    @foreach($products as $product)    
                            @include('components.product.card', ['product' => $product])
                    @endforeach
                
                {{-- {{ $products->withQueryString()->links() }} --}}
            @else
                <p>Không tìm thấy sản phẩm nào.</p>
            @endif
		</div>
        </section>
</div>
@endsection
