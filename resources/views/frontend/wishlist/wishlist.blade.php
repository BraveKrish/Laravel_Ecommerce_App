@extends('frontend.layouts.app')

@section('title', 'Home - Nep Ecommerce')

@section('main-content')
    @push('styles')
        <style>
            .wishlist-item {
                transition: all 0.3s ease;
            }

            .wishlist-item:hover {
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }

            .price {
                font-size: 1.2rem;
                font-weight: 600;
                color: #3d3d3d;
            }

            .original-price {
                text-decoration: line-through;
                color: #888;
                font-size: 0.9rem;
            }

            .navbar-brand {
                font-weight: bold;
            }

            .btn-wishlist {
                color: #ff4757;
            }

            .btn-wishlist:hover {
                color: #ff0022;
            }

            .card-title {
                font-weight: 600;
            }

            .empty-wishlist {
                min-height: 400px;
            }
        </style>
    @endpush
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4 fw-bold">My Wishlist</h1>
                <p class="mb-4 text-success">You have {{ $wishlists->count() }} items in your wishlist</p>
            </div>
        </div>

        <!-- Wishlist Items -->
        <div class="row">
            <!-- Item 1 -->
            @foreach ($wishlists as $wishlist)
            <div class="col-12 mb-4">
                <div class="card wishlist-item border rounded">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img src="{{ asset($wishlist->featured_image) }}" class="img-fluid rounded-start" width="300px"  alt="Wireless Headphones">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="card-title">{{ $wishlist->name }}</h5>
                                    <button class="btn btn-sm btn-wishlist p-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <p class="card-text">{{ $wishlist->description }}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div>
                                        @if ($wishlist->sale_price < $wishlist->price)
                                        <span class="price">${{ $wishlist->sale_price }}</span>
                                        <span class="original-price ms-2">${{ $wishlist->price }}</span>
                                        @else
                                        <span class="price ms-2">${{ $wishlist->price }}</span>
                                        @endif
                                        
                                            @if ($wishlist->sale_price < $wishlist->price)
                                            <span class="badge bg-danger ms-2">SALE</span>
                                            @endif
                                        
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary me-2">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Item 2 -->
            {{-- <div class="col-12 mb-4">
                <div class="card wishlist-item border rounded">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img src="/api/placeholder/240/240" class="img-fluid rounded-start" alt="Smart Watch">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="card-title">Smart Watch Series 5</h5>
                                    <button class="btn btn-sm btn-wishlist p-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <p class="card-text">GPS, always-on Retina display, 30% larger screen, heart rate monitoring
                                    and fitness tracking.</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="price">$349.99</span>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary me-2">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Item 3 -->
            {{-- <div class="col-12 mb-4">
                <div class="card wishlist-item border rounded">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img src="/api/placeholder/240/240" class="img-fluid rounded-start" alt="Laptop">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="card-title">Ultra Slim Laptop Pro</h5>
                                    <button class="btn btn-sm btn-wishlist p-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <p class="card-text">16-inch Retina Display, 16GB RAM, 512GB SSD Storage with Intel i7
                                    processor. Perfect for work and entertainment.</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="price">$1,299.99</span>
                                        <span class="original-price ms-2">$1,499.99</span>
                                        <span class="badge bg-danger ms-2">SALE</span>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary me-2">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Item 4 -->
            {{-- <div class="col-12 mb-4">
                <div class="card wishlist-item border rounded">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img src="/api/placeholder/240/240" class="img-fluid rounded-start" alt="Camera">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="card-title">Professional DSLR Camera</h5>
                                    <button class="btn btn-sm btn-wishlist p-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <p class="card-text">24.2 MP Digital SLR Camera with 18-55mm Lens. Includes camera bag and
                                    accessories.</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="price">$899.99</span>
                                    </div>
                                    <div>
                                        <span class="text-danger me-3">Out of Stock</span>
                                        <button class="btn btn-outline-secondary">Notify Me</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Empty Wishlist State (hidden by default) -->
        <div class="row d-none">
            <div class="col-12">
                <div class="empty-wishlist d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-heart text-muted mb-3" style="font-size: 5rem;"></i>
                    <h3>Your wishlist is empty</h3>
                    <p class="text-muted">Add items to your wishlist to save them for later.</p>
                    <a href="#" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        {{-- <div class="row mt-5">
            <div class="col-12">
                <h3>You might also like</h3>
                <hr>
            </div>
            <!-- Related Product 1 -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/200/200" class="card-img-top" alt="Product">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">Bluetooth Speaker</h6>
                        <p class="price mt-auto mb-1">$79.99</p>
                        <button class="btn btn-sm btn-outline-primary">Add to Wishlist</button>
                    </div>
                </div>
            </div>
            <!-- Related Product 2 -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/200/200" class="card-img-top" alt="Product">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">Fitness Tracker</h6>
                        <p class="price mt-auto mb-1">$59.99</p>
                        <button class="btn btn-sm btn-outline-primary">Add to Wishlist</button>
                    </div>
                </div>
            </div>
            <!-- Related Product 3 -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/200/200" class="card-img-top" alt="Product">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">Wireless Earbuds</h6>
                        <p class="price mt-auto mb-1">$89.99</p>
                        <button class="btn btn-sm btn-outline-primary">Add to Wishlist</button>
                    </div>
                </div>
            </div>
            <!-- Related Product 4 -->
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/200/200" class="card-img-top" alt="Product">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">Portable Charger</h6>
                        <p class="price mt-auto mb-1">$49.99</p>
                        <button class="btn btn-sm btn-outline-primary">Add to Wishlist</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    {{-- @push('home-wishlist-scripts')
    @include('frontend.includes.wishlist-script')
@endpush --}}
@endsection
