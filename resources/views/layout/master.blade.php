<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'صفحه اصلی')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4.2.1/bootstrap.min.css') }}">
    <!-- Custom style for RTL -->

    <link rel="stylesheet" href="/assets/dist/css/custom.css">

    @yield('page-styles')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('layout.navbar')
    @include('layout.right-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            @yield('content-header')
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layout.left-sidebar')

    @include('layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 rtl -->
<script src="{{ asset('assets/plugins/bootstrap4.2.1/bootstrap.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>

@yield('page-scripts')
</body>
</html>
