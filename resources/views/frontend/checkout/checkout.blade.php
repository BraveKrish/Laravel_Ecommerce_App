@extends('frontend.layouts.app')

@section('title', 'Home - Nep Ecommerce')

@section('main-content')
    @push('styles')
        <style>
          .checkout-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
        }
        .order-summary {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
        }
        .payment-method {
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        .payment-method:hover, .payment-method.selected {
            border-color: #007bff;
        }
        .payment-method img {
            max-height: 50px;
            opacity: 0.7;
        }
        .payment-method.selected img {
            opacity: 1;
        }
        </style>
    @endpush
    
    {{-- checkout section --}}
    <div class="container checkout-container mt-5">
        <h1 class="text-center mb-4">Checkout</h1>
        
        <div class="row">
            <!-- Checkout Details Column -->
            <div class="col-md-7 pe-md-4">
                <!-- Shipping Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Shipping Information</h4>
                    </div>
                    <div class="card-body">
                        <form id="shippingForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Street Address</label>
                                <input type="text" class="form-control" placeholder="Street Address" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apartment, Suite, etc. (Optional)</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">State/Province</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Zip/Postal Code</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="billingCheckbox">
                                <label class="form-check-label" for="billingCheckbox">
                                    Billing address is the same as shipping
                                </label>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Billing Information (Initially Hidden) -->
                <div class="card mb-4" id="billingAddressCard" style="display: none;">
                    <div class="card-header">
                        <h4>Billing Information</h4>
                    </div>
                    <div class="card-body">
                        <form id="billingForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Street Address</label>
                                <input type="text" class="form-control" placeholder="Street Address">
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">State/Province</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Zip/Postal Code</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Payment Method</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="payment-method text-center p-3 border rounded" data-method="credit">
                                    <img src="/api/placeholder/100/50" alt="Credit Card" class="img-fluid mb-2">
                                    <p class="m-0">Credit Card</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="payment-method text-center p-3 border rounded" data-method="paypal">
                                    <img src="/api/placeholder/100/50" alt="PayPal" class="img-fluid mb-2">
                                    <p class="m-0">PayPal</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="payment-method text-center p-3 border rounded" data-method="apple">
                                    <img src="/api/placeholder/100/50" alt="Apple Pay" class="img-fluid mb-2">
                                    <p class="m-0">Apple Pay</p>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Form (Initially Hidden) -->
                        <div id="creditCardForm" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Expiration Date</label>
                                    <input type="text" class="form-control" placeholder="MM/YY">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">CVV</label>
                                    <input type="text" class="form-control" placeholder="123">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Column -->
            <div class="col-md-5">
                <div class="order-summary">
                    <h4 class="mb-4">Order Summary</h4>
                    
                    <!-- Order Items -->
                    @foreach ($carts->items as $item)
                    <div class="mb-3 border-bottom pb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="my-0">{{ $item->product->name }}</h6>
                                <small class="text-muted">{{ $item->product->qty }}</small>
                            </div>
                            <span>${{ $item->product->sale_price }}</span>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="mb-3 border-bottom pb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="my-0">Smart Watch</h6>
                                <small class="text-muted">Quantity: 1</small>
                            </div>
                            <span>$199.99</span>
                        </div>
                    </div> --}}

                    <!-- Order Calculations -->
                    <div class="mb-3 border-bottom pb-3">
                        <div class="d-flex justify-content-between">
                            <span>Discount Amount</span>
                            <span>${{ $dAmount }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Shipping</span>
                            <span>${{ $sc }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax</span>
                            <span>${{ $tax }}</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="d-flex justify-content-between fw-bold mb-3">
                        <span>Total</span>
                        <span>${{ $totalAmount }}</span>
                    </div>


                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf

                        @php
                            $orderID = '#' .str_pad(random_int(0,9999999), 6, '0', STR_PAD_LEFT);
                        @endphp


                        <input type="hidden" name="order_id" value="{{ $orderID }}">
                        <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                     <div class="payment-methods mb-4">

                            <h5 class="mb-3">Payment Method</h5>

                            <!-- Cash on Delivery Option -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery"
                                    value="cod" checked>
                                <label class="form-check-label d-flex align-items-center" for="cashOnDelivery">
                                    <i class="bi bi-cash me-2"></i> Cash on Delivery
                                </label>
                            </div>

                            <!-- Wallet Payment Option -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="walletPayment"
                                    value="wallet">
                                <label class="form-check-label" for="walletPayment">
                                    Wallet Payment
                                </label>
                            </div>

                            <!-- Wallet Options (Hidden by default) -->
                            <div id="walletOptions" class="ms-4 mt-2 mb-3" style="display: none;">
                                <div class="d-flex gap-3">
                                    <!-- Khalti Option -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="walletType"
                                            id="khaltiWallet" value="khalti">
                                        <label class="form-check-label d-flex align-items-center" for="khaltiWallet">
                                            <img src="{{ asset('frontend/images/khalti-logo.png') }}" alt="Khalti"
                                                class="me-1" width="64" height="39">
                                        </label>
                                    </div>

                                    <!-- eSewa Option -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="walletType"
                                            id="esewaWallet" value="esewa">
                                        <label class="form-check-label d-flex align-items-center" for="esewaWallet">
                                            <img src="{{ asset('frontend/images/Esewa_logo.webp') }}" alt="eSewa"
                                                class="me-1" width="60" height="39">

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Place Order Button -->
                    <button type="submit" class="btn btn-primary w-100">
                        Place Order
                    </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for showing/hiding wallet options -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const walletPayment = document.getElementById('walletPayment');
                    const cashOnDelivery = document.getElementById('cashOnDelivery');
                    const walletOptions = document.getElementById('walletOptions');

                    walletPayment.addEventListener('change', function() {
                        if (this.checked) {
                            walletOptions.style.display = 'block';
                        }
                    });

                    cashOnDelivery.addEventListener('change', function() {
                        if (this.checked) {
                            walletOptions.style.display = 'none';
                        }
                    });
                });

                function placeOrder() {
                    // Get selected payment method
                    const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                    let walletType = null;

                    if (paymentMethod === 'wallet') {
                        walletType = document.querySelector('input[name="walletType"]:checked')?.value;
                        if (!walletType) {
                            alert('Please select a wallet payment option');
                            return;
                        }
                    }

                    // Here you can handle the order placement with the selected payment method
                    console.log('Payment Method:', paymentMethod);
                    console.log('Wallet Type:', walletType);

                    // Continue with order processing...
                }
            </script>
@endsection
