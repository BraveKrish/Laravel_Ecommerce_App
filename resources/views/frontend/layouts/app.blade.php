<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nep Ecommerce')</title>
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    @include('frontend.includes.header')
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    @include('frontend.includes.navbar')
    

    <!-- Main Content -->
    @yield('main-content')
   
    <!-- Footer -->
    @include('frontend.includes.footer')

    <!-- Bootstrap JS -->
    <script src="{{ asset('dashboard/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('home-wishlist-scripts')
</body>
</html>