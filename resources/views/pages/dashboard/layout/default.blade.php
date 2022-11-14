<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>CPPA - Dashboard</title>
    
        <!-- Custom fonts for this template-->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>

    <body class="bg-success position-relative d-flex flex-column justify-content-between body">
        
        @include('pages.dashboard.includes.header')
        
            @yield('content')
    
        @include('pages.dashboard.includes.footer')
    </body>
</html>