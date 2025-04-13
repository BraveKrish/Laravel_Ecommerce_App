@extends('dashboard.layouts.app')

@section('main-content')
<div class="main-content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <div>
                <button class="btn btn-sm btn-outline-secondary me-2">
                    <i class="fas fa-download fa-sm"></i> Generate Report
                </button>
                <a href="{{ route('create.product') }}"><button class="btn btn-sm btn-primary">
                    <i class="fas fa-plus fa-sm"></i> New Product
                </button></a>
            </div>
        </div>

          <!-- Filters -->
          <div class="card shadow mb-4">
            <div class="card-body filter-row">
                <div class="row g-3">
                    <div class="col-md-3">
                        <select class="form-select form-select-sm">
                            <option selected>All Categories</option>
                            <option>Electronics</option>
                            <option>Clothing</option>
                            <option>Furniture</option>
                            <option>Accessories</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select form-select-sm">
                            <option selected>All Status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Draft</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select form-select-sm">
                            <option selected>Sort By: Latest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Name: A to Z</option>
                            <option>Name: Z to A</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-sm btn-outline-secondary w-100">
                            <i class="fas fa-filter fa-sm"></i> Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>


           <!-- Bulk Actions Bar (Hidden by default) -->
           <div class="card shadow mb-4 bulk-actions">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="me-3"><strong>5</strong> items selected</span>
                        <button class="btn btn-sm btn-outline-primary me-2">
                            <i class="fas fa-tags fa-sm"></i> Set Category
                        </button>
                        <button class="btn btn-sm btn-outline-warning me-2">
                            <i class="fas fa-eye-slash fa-sm"></i> Deactivate
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash fa-sm"></i> Delete
                        </button>
                    </div>
                    <button class="btn btn-sm btn-link text-secondary" id="cancelSelection">
                        Cancel
                    </button>
                </div>
            </div>
        </div>


         <!-- Products Table -->
         <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product 1 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="iPhone 13 Pro">
                                        <div>
                                            <div class="fw-medium">iPhone 13 Pro</div>
                                            <div class="text-muted small">Apple</div>
                                        </div>
                                    </div>
                                </td>
                                <td>IP-13PRO-128</td>
                                <td><span class="badge category-badge badge-electronics">Electronics</span></td>
                                <td>$999.00</td>
                                <td>145</td>
                                <td><span class="product-status status-active"></span> Active</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            
                            <!-- Product 2 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="MacBook Air">
                                        <div>
                                            <div class="fw-medium">MacBook Air M2</div>
                                            <div class="text-muted small">Apple</div>
                                        </div>
                                    </div>
                                </td>
                                <td>MBA-M2-256</td>
                                <td><span class="badge category-badge badge-electronics">Electronics</span></td>
                                <td>$1,199.00</td>
                                <td>89</td>
                                <td><span class="product-status status-active"></span> Active</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            
                            <!-- Product 3 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="Men's Casual T-Shirt">
                                        <div>
                                            <div class="fw-medium">Men's Casual T-Shirt</div>
                                            <div class="text-muted small">Fashion Brand</div>
                                        </div>
                                    </div>
                                </td>
                                <td>MCT-BLK-L</td>
                                <td><span class="badge category-badge badge-clothing">Clothing</span></td>
                                <td>$24.99</td>
                                <td>320</td>
                                <td><span class="product-status status-active"></span> Active</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            
                            <!-- Product 4 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="Leather Sofa">
                                        <div>
                                            <div class="fw-medium">Modern Leather Sofa</div>
                                            <div class="text-muted small">Home Decor</div>
                                        </div>
                                    </div>
                                </td>
                                <td>MLS-BRN-3S</td>
                                <td><span class="badge category-badge badge-furniture">Furniture</span></td>
                                <td>$899.00</td>
                                <td>12</td>
                                <td><span class="product-status status-active"></span> Active</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            
                            <!-- Product 5 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="Wireless Headphones">
                                        <div>
                                            <div class="fw-medium">Wireless Noise-Cancelling Headphones</div>
                                            <div class="text-muted small">Audio Tech</div>
                                        </div>
                                    </div>
                                </td>
                                <td>WH-1000XM4</td>
                                <td><span class="badge category-badge badge-electronics">Electronics</span></td>
                                <td>$349.00</td>
                                <td>67</td>
                                <td><span class="product-status status-active"></span> Active</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            
                            <!-- Product 6 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="Women's Watch">
                                        <div>
                                            <div class="fw-medium">Women's Rose Gold Watch</div>
                                            <div class="text-muted small">Luxury Brand</div>
                                        </div>
                                    </div>
                                </td>
                                <td>WW-RG-123</td>
                                <td><span class="badge category-badge badge-accessories">Accessories</span></td>
                                <td>$199.00</td>
                                <td>43</td>
                                <td><span class="product-status status-draft"></span> Draft</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            
                            <!-- Product 7 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="Gaming Keyboard">
                                        <div>
                                            <div class="fw-medium">RGB Gaming Keyboard</div>
                                            <div class="text-muted small">Gaming Gear</div>
                                        </div>
                                    </div>
                                </td>
                                <td>GK-RGB-101</td>
                                <td><span class="badge category-badge badge-electronics">Electronics</span></td>
                                <td>$129.00</td>
                                <td>0</td>
                                <td><span class="product-status status-inactive"></span> Out of Stock</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            
                            <!-- Product 8 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input product-select" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/api/placeholder/50/50" class="product-image me-3" alt="Coffee Table">
                                        <div>
                                            <div class="fw-medium">Modern Coffee Table</div>
                                            <div class="text-muted small">Home Decor</div>
                                        </div>
                                    </div>
                                </td>
                                <td>MCT-OAK-M</td>
                                <td><span class="badge category-badge badge-furniture">Furniture</span></td>
                                <td>$249.00</td>
                                <td>18</td>
                                <td><span class="product-status status-active"></span> Active</td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted small">
                        Showing 1 to 8 of 24 entries
                    </div>
                    <nav aria-label="Products pagination">
                        <ul class="pagination pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <script>
            // Simple script for mobile sidebar toggle
            document.querySelector('.menu-toggle').addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('show');
            });
            
            // Handle select all functionality
            document.getElementById('selectAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.product-select');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                toggleBulkActions();
            });
            
            // Handle individual checkbox changes
            document.querySelectorAll('.product-select').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    toggleBulkActions();
                });
            });
            
            // Handle cancel selection
            document.getElementById('cancelSelection').addEventListener('click', function() {
                document.getElementById('selectAll').checked = false;
                document.querySelectorAll('.product-select').forEach(checkbox => {
                    checkbox.checked = false;
                });
                toggleBulkActions();
            });
            
            // Toggle bulk actions bar
            function toggleBulkActions() {
                const checkboxes = document.querySelectorAll('.product-select:checked');
                const bulkActions = document.querySelector('.bulk-actions');
                
                if (checkboxes.length > 0) {
                    bulkActions.classList.add('show');
                } else {
                    bulkActions.classList.remove('show');
                }
            }
        </script>
    </div>
</div>

@endsection