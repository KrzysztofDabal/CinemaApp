<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('assets/css/admin-styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" rel="stylesheet"></script>

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet">
    <style>
        .dataTables_wrapper .dataTables_length {
            padding: 10px !important;
        }
        .dataTables_wrapper .dataTables_filter {
            padding: 10px !important;
        }
    </style>


</head>
<body>

    @include('layouts.admin.admin-navbar')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.admin.admin-sidebar')
        </div>

        <div id="layoutSidenav_content">
            <main>

                @yield('content')
            </main>

            @include('layouts.admin.admin-footer')
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.3.6.1.jquery.min.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myDataTable').DataTable();
        } );
    </script>

</body>
</html>
