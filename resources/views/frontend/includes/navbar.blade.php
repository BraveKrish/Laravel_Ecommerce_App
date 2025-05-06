<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('site.home') }}">ModernShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('site.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('wishlist.page') }}">Wishlist</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.register') }}">Login/Register</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.register') }}">Login/Register</a>
                </li> --}}


            </ul>
            {{-- <div class="d-flex align-items-center">
                <div class="input-group me-3 d-none d-lg-flex" style="width: 300px;">
                    <input type="text" class="form-control" placeholder="Search products..." aria-label="Search">
                    <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                </div>
                <div class="d-flex">
                    <a href="#" class="btn btn-link text-dark me-2"><i class="bi bi-person fs-5"></i></a>
                    <a href="{{ route('wishlist.page') }}" class="btn btn-link text-dark me-2"><i class="bi bi-heart fs-5"></i></a>
                    <a href="#" class="btn btn-link text-dark position-relative">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                    </a>

                    @if (Auth::check())
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-dark">
                            <i class="fas fa-cog"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    @endif
                </div>
                
            </div> --}}
            <div class="d-flex align-items-center">
                <div class="input-group me-3 d-none d-lg-flex" style="width: 300px;">
                    <input type="text" class="form-control" placeholder="Search products..." aria-label="Search">
                    <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                </div>
                <a href="{{ route('show.cart.item') }}" class="btn btn-primary position-relative me-3">
                    <i class="bi bi-cart3"></i> Cart
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count">3</span>
                </a>
                <a href="{{ route('wishlist.page') }}" class="btn btn-outline-dark me-2">
                    <i class="bi bi-heart"></i> Wishlist
                </a>
                <a href="#" class="btn btn-dark mx-2">
                    <i class="bi bi-person"></i> Profile
                </a>
                @if (Auth::check())
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-dark">
                            <i class="fas fa-cog"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>
