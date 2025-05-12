@extends('dashboard.layouts.app')

@section('main-content')
    <div class="main-content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <div>
                    <a href="{{ route('create.product') }}"><button class="btn btn-sm btn-primary">
                            <i class="fas fa-plus fa-sm"></i> Product Categories
                        </button></a>
                    <button class="btn btn-sm btn-outline-secondary me-2">
                        <i class="fas fa-download fa-sm"></i> Generate Report
                    </button>
                    <a href="{{ route('create.product') }}"><button class="btn btn-sm btn-primary">
                            <i class="fas fa-plus fa-sm"></i> New Product
                        </button></a>
                </div>
            </div>

            <div class="card shadow mb-4">
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
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Promo Code Generator</h6>
                    <button class="btn btn-sm btn-success" >Generate Code</button>
                </div>
                <div class="card-body">
                    <form id="promoForm" method="POST" action="{{ route('promocode.create') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="promoCode">Promo Code</label>
                                <input type="text" class="form-control" id="promoCode" name="code">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="discount">Discount (%)</label>
                                <input type="number" class="form-control" id="discount" name="value" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="expiryDate">Expiry Date</label>
                                <input type="date" class="form-control" id="expiryDate" name="expires_at" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="usages_limit">Usage Limit</label>
                                <input type="number" class="form-control" id="usages_limit" name="usages_limit" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="discount">Discount Banner</label>
                                <input type="file" class="form-control" id="banner" name="banner" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Save Promo Code</button>
                    </form>

                    <hr>

                    <h6 class="font-weight-bold text-primary mt-4">Existing Promo Codes</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-2" id="promoTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Discount</th>
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promoCodes as $pc)

                                <tr>
                                    <td>1</td>
                                    <td>{{ $pc->code }}</td>
                                    <td>{{ $pc->value }}%</td>
                                    <td>{{ \Carbon\Carbon::parse($pc->expires_at)->format('d M Y') }}</td>
                                    <td>
                                        @if ($pc->is_active)
                                        <span class="badge badge-success text-success">Active</span>
                                         @else
                                        <span class="badge badge-danger text-warning">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
