<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset("/") }}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset("/") }}admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset("/") }}admin/css/sb-admin.css" rel="stylesheet">


    @yield("extra-css")

</head>

<body id="page-top">

@include("admin.includes.header")

<div id="wrapper">

    <!-- Sidebar -->
    @include("admin.includes.sidebar")

    <div id="content-wrapper">

        @yield("body")

        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        @include("admin.includes.footer")

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="{{ asset("/") }}admin/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset("/") }}admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset("/") }}admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="{{ asset("/") }}admin/vendor/chart.js/Chart.min.js"></script>
<script src="{{ asset("/") }}admin/vendor/datatables/jquery.dataTables.js"></script>
<script src="{{ asset("/") }}admin/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset("/") }}admin/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="{{ asset("/") }}admin/js/demo/datatables-demo.js"></script>
<script src="{{ asset("/") }}admin/js/demo/chart-area-demo.js"></script>

@yield("extra-js")

</body>

</html>
