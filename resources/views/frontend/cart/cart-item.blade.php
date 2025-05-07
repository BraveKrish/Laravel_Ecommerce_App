@extends('frontend.layouts.app')

@section('title', 'Home - Nep Ecommerce')
   
@section('main-content')
@push('styles')
<style>
    .cart-item-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
    }
    .quantity-input {
        width: 70px;
    }
    .cart-summary {
        background-color: #f8f9fa;
        border-radius: 5px;
    }
    .product-link {
        color: #212529;
        text-decoration: none;
    }
    .product-link:hover {
        color: #0d6efd;
    }
    .continue-shopping {
        color: #6c757d;
        text-decoration: none;
    }
    .continue-shopping:hover {
        color: #0d6efd;
    }
    .payment-icon {
        height: 24px;
        margin-right: 8px;
    }
    .empty-cart {
        max-width: 250px;
        margin: 0 auto;
    }
    @media (max-width: 767.98px) {
        .cart-item-img {
            width: 80px;
            height: 80px;
        }
    }
</style>
@endpush
 <!-- Cart Section -->
 <div class="container my-5">
    <h1 class="mb-4">Shopping Cart</h1>
    
    <div class="row">
        {{-- {{ dd($carts->items->toArray()) }} --}}
        <!-- Cart Items -->
        <div class="col-lg-8">
            <!-- Regular cart view (when items exist) -->
            <div id="cart-with-items">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="mb-0">Cart Items ({{ $carts->items->count() }})</h5>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-link p-0 text-danger" onclick="showEmptyCart()">Clear Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Item 1 -->
                        @foreach ($carts->items as $item)
                        {{-- {{ $item->product }} --}}
                        <div class="row mb-4 border-bottom pb-4">
                            <div class="col-md-2 col-4">
                                <img src="{{ asset($item->product->featured_image) }}" alt="Product" class="img-fluid rounded cart-item-img">
                            </div>
                            <div class="col-md-10 col-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="#" class="product-link">
                                    <h5 class="mb-1">{{ $item->product->name }}</h5>
                                        </a>
                                        <p class="mb-1 text-muted">{{ $item->product->category->title }} | Brand: Test Brand</p>
                                        <p class="mb-3"><span class="badge bg-success">In Stock</span></p>
                                        <div class="d-md-none d-flex justify-content-between align-items-center mb-2">
                                            <span class="fw-bold">${{ $item->product->price }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-5">
                                        <div class="input-group quantity-input mb-3">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateCartQuantity(this, -1)">-</button>
                                            <input type="text" class="form-control text-center" value="1" min="1" onchange="recalculateCart()">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateCartQuantity(this, 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-7 d-none d-md-block">
                                        <span style="text-decoration:line-through;color:#999999 !important;" class="fw-bold">${{ $item->product->price }}</span>
                                    </div>
                                    <div class="col-md-2 text-md-end">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-md-none d-inline-block">
                                                <button class="btn btn-sm p-0 text-danger" onclick="removeCartItem(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                            <span class="fw-bold item-total">${{ $item->product->sale_price }}</span>
                                            <div class="d-none d-md-inline-block">
                                                <button class="btn btn-sm p-0 ms-2 text-danger" onclick="removeCartItem(this)" title="Remove item">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- <!-- Item 2 -->
                        <div class="row mb-4 border-bottom pb-4">
                            <div class="col-md-2 col-4">
                                <img src="/api/placeholder/300/300" alt="Product" class="img-fluid rounded cart-item-img">
                            </div>
                            <div class="col-md-10 col-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="#" class="product-link">
                                            <h5 class="mb-1">Slim Fit Jeans</h5>
                                        </a>
                                        <p class="mb-1 text-muted">Size: 32 | Color: Black</p>
                                        <p class="mb-3"><span class="badge bg-success">In Stock</span></p>
                                        <div class="d-md-none d-flex justify-content-between align-items-center mb-2">
                                            <span class="fw-bold">$49.99</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-5">
                                        <div class="input-group quantity-input mb-3">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateCartQuantity(this, -1)">-</button>
                                            <input type="text" class="form-control text-center" value="1" min="1" onchange="recalculateCart()">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateCartQuantity(this, 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-7 d-none d-md-block">
                                        <span class="fw-bold">$49.99</span>
                                    </div>
                                    <div class="col-md-2 text-md-end">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-md-none d-inline-block">
                                                <button class="btn btn-sm p-0 text-danger" onclick="removeCartItem(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                            <span class="fw-bold item-total">$49.99</span>
                                            <div class="d-none d-md-inline-block">
                                                <button class="btn btn-sm p-0 ms-2 text-danger" onclick="removeCartItem(this)" title="Remove item">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="row mb-2">
                            <div class="col-md-2 col-4">
                                <img src="/api/placeholder/300/300" alt="Product" class="img-fluid rounded cart-item-img">
                            </div>
                            <div class="col-md-10 col-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="#" class="product-link">
                                            <h5 class="mb-1">Running Shoes</h5>
                                        </a>
                                        <p class="mb-1 text-muted">Size: 10 | Color: Red</p>
                                        <p class="mb-3"><span class="badge bg-success">In Stock</span></p>
                                        <div class="d-md-none d-flex justify-content-between align-items-center mb-2">
                                            <span class="fw-bold">$89.99</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-5">
                                        <div class="input-group quantity-input mb-3">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateCartQuantity(this, -1)">-</button>
                                            <input type="text" class="form-control text-center" value="1" min="1" onchange="recalculateCart()">
                                            <button class="btn btn-outline-secondary" type="button" onclick="updateCartQuantity(this, 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-7 d-none d-md-block">
                                        <span class="fw-bold">$89.99</span>
                                    </div>
                                    <div class="col-md-2 text-md-end">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-md-none d-inline-block">
                                                <button class="btn btn-sm p-0 text-danger" onclick="removeCartItem(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                            <span class="fw-bold item-total">$89.99</span>
                                            <div class="d-none d-md-inline-block">
                                                <button class="btn btn-sm p-0 ms-2 text-danger" onclick="removeCartItem(this)" title="Remove item">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <a href="#" class="continue-shopping"><i class="bi bi-arrow-left me-2"></i>Continue Shopping</a>
                    <button class="btn btn-outline-primary" onclick="updateCart()">Update Cart</button>
                </div>
            </div>

            <!-- Empty cart view (shown when cart is empty) -->
            <div id="empty-cart" class="text-center py-5" style="display: none;">
                <div class="empty-cart">
                    <i class="bi bi-cart-x text-muted" style="font-size: 5rem;"></i>
                    <h3 class="mt-3">Your cart is empty</h3>
                    <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet.</p>
                    <a href="#" class="btn btn-primary">Start Shopping</a>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card cart-summary shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Order Summary</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span id="cart-subtotal" class="fw-bold">${{ $subTotal }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span id="cart-shipping">$5.99</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax</span>
                        <span id="cart-tax">$14.40</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold">Total</span>
                        <span id="cart-total" class="fw-bold fs-5">$200.36</span>
                    </div>

                    <!-- Promo Code -->
                    <div class="mb-4">
                        <label for="promo-code" class="form-label">Promo Code</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="promo-code" placeholder="Enter code">
                            <button class="btn btn-outline-secondary" type="button" id="apply-promo">Apply</button>
                        </div>
                        <div id="promo-message" class="small text-success" style="display: none;">
                            Promo code SAVE10 applied successfully!
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="button" onclick="proceedToCheckout()">
                            Proceed to Checkout
                        </button>
                        <div class="text-center mt-3">
                            <small class="text-muted">Secure Payment Options</small>
                            <div class="mt-2">
                                <img src="/api/placeholder/30/20" alt="Visa" class="payment-icon">
                                <img src="/api/placeholder/30/20" alt="Mastercard" class="payment-icon">
                                <img src="/api/placeholder/30/20" alt="PayPal" class="payment-icon">
                                <img src="/api/placeholder/30/20" alt="Apple Pay" class="payment-icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- You May Also Like -->
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">You May Also Like</h5>
                </div>
                <div class="card-body">
                    <!-- Recommendation 1 -->
                    <div class="d-flex mb-3 pb-3 border-bottom">
                        <img src="/api/placeholder/80/80" alt="Product" class="img-fluid rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <h6 class="mb-1"><a href="#" class="product-link">Lightweight Jacket</a></h6>
                            <div class="text-muted small mb-1">$69.99</div>
                            <button class="btn btn-sm btn-outline-primary" onclick="quickAddToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Recommendation 2 -->
                    <div class="d-flex mb-3 pb-3 border-bottom">
                        <img src="/api/placeholder/80/80" alt="Product" class="img-fluid rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <h6 class="mb-1"><a href="#" class="product-link">Leather Wallet</a></h6>
                            <div class="text-muted small mb-1">$29.99</div>
                            <button class="btn btn-sm btn-outline-primary" onclick="quickAddToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Recommendation 3 -->
                    <div class="d-flex">
                        <img src="/api/placeholder/80/80" alt="Product" class="img-fluid rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <h6 class="mb-1"><a href="#" class="product-link">Cotton Socks (3-Pack)</a></h6>
                            <div class="text-muted small mb-1">$12.99</div>
                            <button class="btn btn-sm btn-outline-primary" onclick="quickAddToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recently Viewed Products -->
    {{-- <div class="mt-5">
        <h3 class="mb-4">Recently Viewed</h3>
        <div class="row">
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/300/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Casual Denim Jeans</h5>
                        <p class="card-text mb-1">$49.99</p>
                        <div class="d-flex align-items-center small text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span class="text-muted ms-1">(42)</span>
                        </div>
                        <button class="btn btn-sm btn-primary w-100">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/300/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Leather Belt</h5>
                        <p class="card-text mb-1">$29.99</p>
                        <div class="d-flex align-items-center small text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="text-muted ms-1">(78)</span>
                        </div>
                        <button class="btn btn-sm btn-primary w-100">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/300/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Canvas Sneakers</h5>
                        <p class="card-text mb-1">$59.99</p>
                        <div class="d-flex align-items-center small text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <span class="text-muted ms-1">(23)</span>
                        </div>
                        <button class="btn btn-sm btn-primary w-100">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card h-100">
                    <img src="/api/placeholder/300/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Wool Scarf</h5>
                        <p class="card-text mb-1">$19.99</p>
                        <div class="d-flex align-items-center small text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <span class="text-muted ms-1">(106)</span>
                        </div>
                        <button class="btn btn-sm btn-primary w-100">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection