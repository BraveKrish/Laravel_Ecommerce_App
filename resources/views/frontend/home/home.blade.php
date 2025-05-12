@extends('frontend.layouts.app')

@section('title', 'Home - Nep Ecommerce')
   
@section('main-content')
<section class="hero-section">
    <div class="container">
        {{-- {{ Auth::user() }} --}}
        {{-- {{ dd($featuredProducts->toArray()) }} --}}
        <div class="row align-items-center">
            <div class="col-md-6 hero-content">
                <h1 class="mb-4">Summer Collection 2025</h1>
                <p class="lead mb-4">Discover our new arrivals with up to 40% off. Limited time offer on selected items.</p>
                <a href="#" class="btn btn-primary btn-lg px-4 me-2">Shop Now</a>
                <a href="#" class="btn btn-outline-light btn-lg px-4">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Product Categories -->
<section class="container mb-5">
    <h2 class="section-title">Shop by Category</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="cat-card">
                <img src="/api/placeholder/600/400" alt="Men's Fashion" class="img-fluid w-100">
                <div class="cat-card-overlay">
                    <h3>Men's Fashion</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cat-card">
                <img src="/api/placeholder/600/400" alt="Women's Fashion" class="img-fluid w-100">
                <div class="cat-card-overlay">
                    <h3>Women's Fashion</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cat-card">
                <img src="/api/placeholder/600/400" alt="Accessories" class="img-fluid w-100">
                <div class="cat-card-overlay">
                    <h3>Accessories</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="cat-card">
                <img src="/api/placeholder/800/400" alt="Home & Living" class="img-fluid w-100">
                <div class="cat-card-overlay">
                    <h3>Home & Living</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="cat-card">
                <img src="/api/placeholder/800/400" alt="Electronics" class="img-fluid w-100">
                <div class="cat-card-overlay">
                    <h3>Electronics</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="container mb-5">
    {{-- {{ $featuredProducts }} --}}
    <h2 class="section-title">Featured Products</h2>
    <div class="row">
        @foreach ($featuredProducts as $product)
        {{-- {{ $product }} --}}
        <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="{{ asset($product->featured_image) }}" class="card-img-top" alt="Product 1">
                    @if ($product->discount_percent > 0)
                    <span class="discount-badge">{{ $product->discount_percent }}% OFF</span>
                    @endif
                    
                    <div class="product-action d-flex">
                        {{-- <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a> --}}
                        <button class="btn product-action-btn wishlist-toggle-btn" data-id="{{ $product->id }}"><i class="bi bi-heart }}" id="wishlist-icon-{{ $product->id }}" ></i></button>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <form action="{{ route('add.to.cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="product-action-btn btn"><i class="bi bi-cart-plus"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><small class="text-muted">{{ $product->category->title }}</small></p>
                    <div class="d-flex align-items-center">
                        @if ($product->discount_percent > 0)
                            <span class="original-price">${{ $product->price }}</span>
                        @endif
                        
                        <span class="price">${{ $product->sale_price }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="/api/placeholder/400/400" class="card-img-top" alt="Product 2">
                    <span class="discount-badge">-15%</span>
                    <div class="product-action d-flex">
                        <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Leather Crossbody Bag</h5>
                    <p class="card-text"><small class="text-muted">Women's Accessories</small></p>
                    <div class="d-flex align-items-center">
                        <span class="original-price">$89.99</span>
                        <span class="price">$76.49</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="/api/placeholder/400/400" class="card-img-top" alt="Product 3">
                    <div class="product-action d-flex">
                        <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Wireless Headphones</h5>
                    <p class="card-text"><small class="text-muted">Electronics</small></p>
                    <div class="d-flex align-items-center">
                        <span class="price">$129.99</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="/api/placeholder/400/400" class="card-img-top" alt="Product 4">
                    <span class="discount-badge">-30%</span>
                    <div class="product-action d-flex">
                        <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Smart Watch</h5>
                    <p class="card-text"><small class="text-muted">Electronics</small></p>
                    <div class="d-flex align-items-center">
                        <span class="original-price">$199.99</span>
                        <span class="price">$139.99</span>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>

<!-- Offer Banner -->
<section class="container mb-5">
    <div class="offer-banner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6">
                <div class="offer-content">
                    <h2 class="mb-4">Special Offer</h2>
                    <h3 class="mb-4">Get {{ number_format($promoCode->value, 0) }}% Off On Your First Purchase!</h3>
                    <p class="mb-4">Use code <strong>{{ $promoCode->code }}</strong> at checkout</p>
                    <a href="#" class="btn btn-light btn-lg">Shop Now</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="/api/placeholder/800/600" alt="Special Offer" class="img-fluid">
            </div>
        </div>
    </div>  
</section>

<!-- Trending Products -->
<section class="container mb-5">
    <h2 class="section-title">Trending Now</h2>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="/api/placeholder/400/400" class="card-img-top" alt="Trending Product 1">
                    <span class="trending-badge"><i class="bi bi-fire"></i> Hot</span>
                    <div class="product-action d-flex">
                        <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Premium Sneakers</h5>
                    <p class="card-text"><small class="text-muted">Men's Footwear</small></p>
                    <div class="d-flex align-items-center">
                        <span class="price">$89.99</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="/api/placeholder/400/400" class="card-img-top" alt="Trending Product 2">
                    <span class="trending-badge"><i class="bi bi-fire"></i> Hot</span>
                    <div class="product-action d-flex">
                        <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Designer Sunglasses</h5>
                    <p class="card-text"><small class="text-muted">Accessories</small></p>
                    <div class="d-flex align-items-center">
                        <span class="price">$125.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="/api/placeholder/400/400" class="card-img-top" alt="Trending Product 3">
                    <span class="trending-badge"><i class="bi bi-fire"></i> Hot</span>
                    <div class="product-action d-flex">
                        <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Organic Skincare Set</h5>
                    <p class="card-text"><small class="text-muted">Beauty</small></p>
                    <div class="d-flex align-items-center">
                        <span class="price">$79.99</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="/api/placeholder/400/400" class="card-img-top" alt="Trending Product 4">
                    <span class="trending-badge"><i class="bi bi-fire"></i> Hot</span>
                    <div class="product-action d-flex">
                        <a href="#" class="product-action-btn"><i class="bi bi-heart"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-eye"></i></a>
                        <a href="#" class="product-action-btn"><i class="bi bi-cart-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Portable Bluetooth Speaker</h5>
                    <p class="card-text"><small class="text-muted">Electronics</small></p>
                    <div class="d-flex align-items-center">
                        <span class="price">$59.99</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container text-center">
        <h2 class="mb-4">Subscribe to Our Newsletter</h2>
        <p class="mb-5 text-muted mx-auto" style="max-width: 600px;">Stay updated with our latest products, exclusive offers, and fashion tips. Subscribe now and get 10% off on your first purchase.</p>
        <div class="input-group mb-3 mx-auto">
            <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
        </div>
    </div>
</section>
@push('home-wishlist-scripts')
    @include('frontend.includes.wishlist-script')
@endpush
@endsection