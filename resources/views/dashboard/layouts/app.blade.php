<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ecommerce Dashboard')</title>
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --}}

    {{-- bootstrap css link --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/bootstrap/css/bootstrap.min.css') }}">


    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    {{-- custom css link --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/styles.css') }}">


</head>
<body>
    <!-- Sidebar goes here  -->
    @include('dashboard.includes.sidebar')
   

    <!-- Top Navigation Bar -->
    @include('dashboard.includes.topbar')
   

    <!-- Main Content -->
    @yield('main-content')



    <!-- Bootstrap JS Bundle with Popper -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}

    <script src="{{ asset('dashboard/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Simple script for mobile sidebar toggle
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
    </script>
</body>
</html>
