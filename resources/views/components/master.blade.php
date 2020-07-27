<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('back/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{  asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('back/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('back/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    {{ $slot }}

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('back/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('back/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('back/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('back/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('back/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('back/js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('back/js/demo/datatables-demo.js') }}"></script>

    <!-- Laravel default scripts -->
    <script src="{{ asset('back/js/main.js') }}"></script>

</body>

</html>
