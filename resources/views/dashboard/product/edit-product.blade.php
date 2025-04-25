@extends('dashboard.layouts.app')

@section('main-content')
<div class="main-content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
            <div>
                {{-- <button class="btn btn-sm btn-outline-secondary me-2">
                    <i class="fas fa-download fa-sm"></i> Generate Report
                </button> --}}
                {{-- <button class="btn btn-sm btn-primary">
                    Add New Product
                </button> --}}
                <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
            </div>
        </div>


        {{-- product form --}}
        <div class="row">
            <!-- Total Sales -->
            <!-- Product Form -->
            <div class="row">
                <!-- Product Form -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Edit Product</h5>
                        </div>

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        {{-- {{ $categories }} --}}
                        {{-- {{ $product }} --}}
                        <div class="card-body">
                            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <!-- Product Information Section -->
                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Product Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="productName" value="{{ $product->name }}" name="name" placeholder="Enter product name" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="productCategory" class="form-label">Category</label>
                                            <select class="form-select" id="productCategory" name="category_id" required>
                                                <option value="" selected disabled>Select category</option>
                                                @foreach ($categories as $category)
                                                
                                                <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}" >{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="productDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="productDescription" name="description" rows="3" placeholder="Enter product description">{{ $product->description }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="featuredProduct" name="is_featured" {{ $product->is_featured == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="featuredProduct">Featured Product</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Pricing Section -->
                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Pricing & Inventory</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="productPrice" class="form-label">Price ($)</label>
                                                <input type="number" class="form-control" id="productPrice" name="price" value="{{ $product->price }}" placeholder="0.00" step="0.01" min="0" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="productSalePrice" class="form-label">Sale Price ($) (Optional)</label>
                                                <input type="number" name="sale_price" class="form-control" id="productSalePrice" placeholder="0.00" value="{{ $product->sale_price }}" step="0.01" min="0">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="productQuantity" class="form-label">Quantity in Stock</label>
                                                <input type="number" class="form-control" id="productQuantity" name="qty" value="{{ $product->qty }}" placeholder="0" min="0" required>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <label for="productSKU" class="form-label">SKU</label>
                                                <input type="text" class="form-control" id="productSKU" placeholder="Enter SKU">
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Media Section -->
                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Media</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="productImage" class="form-label">Product Image</label>
                                            <input type="file" class="form-control" name="featured_image" id="productImage" accept="image/*" onchange="previewImage(this)">
                                            <div class="mt-3">
                                                <p class="text-muted small">Old Image</p>
                                                <div class="p-3 border rounded">
                                                    <img height="200px" width="200px" src="{{ asset($product->featured_image) }}" class="img-fluid" alt="Product Preview">
                                                    {{-- <p class="text-muted mb-0" id="noImageText">No image selected</p> --}}
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-muted small">Preview:</p>
                                                <div class="p-3 border rounded" id="imagePreviewContainer">
                                                    <img height="200px" width="200px" id="imagePreview" class="img-fluid d-none" alt="Product Preview">
                                                    <p class="text-muted mb-0" id="noImageText">No image selected</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="productGallery" class="form-label">Additional Images (Optional)</label>
                                            <input type="file" class="form-control" id="productGallery" multiple accept="image/*">
                                            <div class="form-text">You can select multiple images for the product gallery</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="reset" class="btn btn-secondary me-md-2">Clear</button>
                                    <button type="submit" class="btn btn-primary">Edit Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- JavaScript for image preview -->
            <script>
                function previewImage(input) {
                    const preview = document.getElementById('imagePreview');
                    const noImageText = document.getElementById('noImageText');
                    
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            preview.setAttribute('src', e.target.result);
                            preview.classList.remove('d-none');
                            noImageText.classList.add('d-none');
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        preview.classList.add('d-none');
                        noImageText.classList.remove('d-none');
                    }
                }
            </script>
        </div>
    </div>
</div>
@endsection