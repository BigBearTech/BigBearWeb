<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>BigBearWeb Admin</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Twitter Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
    <!-- DataTables Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
    <!-- DataTables Fixed Header -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
    <!-- Dropzone.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    <!-- Angular UI Tree -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-tree/2.16.0/angular-ui-tree.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
        @include('admin._nav')
        @include('admin._sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('content')
        </div>
        @include('admin._footer')
        @include('admin._control-sidebar')
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- AngularJS -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <!-- AngularJS UI Tree -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-tree/2.16.0/angular-ui-tree.min.js"></script>
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Admin LTE -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/js/app.min.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <!-- DataTables Responsive -->
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
    <!-- DataTables Fixed Header -->
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>
    <!-- CKEditor -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.9/ckeditor.js"></script>
    <!-- Dropzone.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <!-- <script src="{{ asset('js/backend.js') }}"></script> -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
        $(function () {
            $("#example1").DataTable({
                responsive: true,
                fixedHeader: true
            });
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true
            });
            CKEDITOR.replace('bbeditor');
        });
    </script>
</body>
</html>
