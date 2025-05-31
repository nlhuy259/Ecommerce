<h3 class="mb-4">Danh Mục</h3>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 text-center">
                <a href="{{ route('category', $category->slug) }}" class="text-decoration-none text-dark">
                    <div class="rounded-circle overflow-hidden mx-auto" style="width: 80px; height: 80px;">
                        <img src="{{ asset('storage/' . $category->name) }}" class="img-fluid h-100 w-100 object-fit-cover" alt="{{ $category->name }}">
                    </div>
                    <div class="mt-2" style="font-size: 14px;">{{ $category->name }}</div>
                </a>
            </div>
        @endforeach
    </div>