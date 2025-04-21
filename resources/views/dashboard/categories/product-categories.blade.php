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

        {{-- category form --}}
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
            <div class="card-body filter-row">
                <div class="row g-3">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Category Title</label>
                          <input type="text" class="form-control" name="title" id="title" >
                          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Image(Media)</label>
                          <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                </div>
            </div>
        </div>


         {{-- categories table --}}
         <div class="card shadow mb-4">
            <div class="card-body filter-row">
                <div class="row g-3">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>John</td>
                            <td>Doe</td>
                            <td>@social</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection