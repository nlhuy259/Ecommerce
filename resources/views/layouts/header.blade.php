<header>
  @if(Route::getCurrentRoute()->getName() != 'login' && Route::getCurrentRoute()->getName() != 'register')
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="/">
            <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Logo
          </a>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products') }}">Product</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($navbarCategories as $category)
                    <a class="dropdown-item" href="{{ route('category', $category->slug) }}">
                      {{ $category->name }}
                    </a>
                @endforeach
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cart') }}">
                <i class="fas fa-shopping-cart"></i> Cart
                @if(session('cart'))
                    <span class="badge badge-pill badge-primary">{{ count(session('cart')) }}</span>
                @endif
              </a>
            </li>
            <li class="nav-item">
              @auth
                <a class="nav-link" href="{{ route('profile') }}">
                  <i class="fas fa-user"></i>
                </a>
              @else
                <a class="nav-link" href="{{ route('login') }}">
                  <i class="fas fa-user"></i>
                </a>
              @endauth
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search products..." aria-label="Search" value="{{ request('query') }}">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
  @endif
</header>
