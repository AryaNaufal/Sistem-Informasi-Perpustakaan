<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Authentication</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('templates/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('templates/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('style.css') }}" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary d-flex justify-content-center align-items-center" style="height: 100vh; ">

        {{-- @yield('content') --}}
        <div class="container">
            {{ $slot }}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('templates/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('templates/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('templates/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('templates/js/sb-admin-2.min.js') }}"></script>

    </body>

</html>
