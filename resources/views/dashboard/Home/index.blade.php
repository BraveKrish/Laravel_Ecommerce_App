@extends('dashboard.layouts.app')
@section('title', 'Home - Ecommerce Dashboard')

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
                <button class="btn btn-sm btn-primary">
                    <i class="fas fa-plus fa-sm"></i> New Product
                </button>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="row">
            <!-- Total Sales -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 stat-card" style="border-left-color: #4e73df;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Sales (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 stat-card" style="border-left-color: #1cc88a;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Revenue (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 stat-card" style="border-left-color: #36b9cc;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">New Orders
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">124</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Satisfaction -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 stat-card" style="border-left-color: #f6c23e;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Customer Satisfaction</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 me-3 font-weight-bold text-gray-800">92%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm me-2">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 92%" aria-valuenow="92" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-smile fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Sales Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sales Overview</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Weekly</a></li>
                                <li><a class="dropdown-item" href="#">Monthly</a></li>
                                <li><a class="dropdown-item" href="#">Yearly</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <img src="/api/placeholder/700/350" alt="Sales Chart Placeholder" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product Categories</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="#">Download CSV</a></li>
                                <li><a class="dropdown-item" href="#">Print</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <img src="/api/placeholder/300/300" alt="Category Chart Placeholder" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="me-2">
                                <i class="fas fa-circle text-primary"></i> Electronics
                            </span>
                            <span class="me-2">
                                <i class="fas fa-circle text-success"></i> Clothing
                            </span>
                            <span class="me-2">
                                <i class="fas fa-circle text-info"></i> Furniture
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Recent Orders -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive recent-orders">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD-0025</td>
                                        <td>Emma Wilson</td>
                                        <td>Smartphone X</td>
                                        <td>$899</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-0024</td>
                                        <td>James Brown</td>
                                        <td>Laptop Pro</td>
                                        <td>$1299</td>
                                        <td><span class="badge bg-warning text-dark">Processing</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-0023</td>
                                        <td>Olivia Smith</td>
                                        <td>Wireless Earbuds</td>
                                        <td>$129</td>
                                        <td><span class="badge bg-info">Shipped</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-0022</td>
                                        <td>Noah Johnson</td>
                                        <td>Smart Watch</td>
                                        <td>$249</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-0021</td>
                                        <td>Sophia Davis</td>
                                        <td>Coffee Maker</td>
                                        <td>$89</td>
                                        <td><span class="badge bg-danger">Cancelled</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Products -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Top Products</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>iPhone 13 Pro</span>
                                <span>65%</span>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>MacBook Air</span>
                                <span>45%</span>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Sony Headphones</span>
                                <span>30%</span>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Smart TV 55"</span>
                                <span>25%</span>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Gaming Console</span>
                                <span>15%</span>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection