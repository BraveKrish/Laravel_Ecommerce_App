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
                <button class="btn btn-sm btn-primary">
                    <i class="fas fa-plus fa-sm"></i> New Product
                </button>
            </div>
        </div>

                <!-- Stats Row -->
                <div class="row">
                    <!-- Total Sales -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <h3>Hello this is product listing page.</h3>
                    </div>
                </div>
    </div>
</div>

@endsection