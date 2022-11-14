<!DOCTYPE html>
<html lang="es">

    @include('assets.head')

    <body class="bg-success position-relative d-flex flex-column justify-content-between body">
        
        @include('includes.header')

        <main class="container mb-3 align-self-center">
            @yield('content')
        </main>
    
        @include('includes.footer')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>