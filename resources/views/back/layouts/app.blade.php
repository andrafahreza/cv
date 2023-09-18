<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin MHD ANDRA FAHREZA</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('back/assets/images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('back/assets/css/backend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/@icon/dripicons/dripicons.css') }}">

    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/core/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/daygrid/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/timegrid/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('back/assets/vendor/fullcalendar/list/main.css') }}' />
    <link rel="stylesheet" href="{{ asset('back/assets/vendor/mapbox/mapbox-gl.css') }}">
</head>

<body class="sidebar-double-icon  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        @include('back.layouts.components.header')

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                        <h3 class="card-title pb-3">Welcome Ariana</h3>
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper End-->

    @include('back.layouts.components.footer')

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('back/assets/js/backend-bundle.min.js') }}"></script>

    <!-- Flextree Javascript-->
    <script src="{{ asset('back/assets/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('back/assets/js/table-treeview.js') }}"></script>

    <!-- Masonary Gallery Javascript -->
    <script src="{{ asset('back/assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!-- Mapbox Javascript -->
    <script src="{{ asset('back/assets/js/mapbox-gl.js') }}"></script>
    <script src="{{ asset('back/assets/js/mapbox.js') }}"></script>

    <!-- Fullcalender Javascript -->
    <script src='{{ asset('back/assets/vendor/fullcalendar/core/main.js') }}'></script>
    <script src='{{ asset('back/assets/vendor/fullcalendar/daygrid/main.js') }}'></script>
    <script src='{{ asset('back/assets/vendor/fullcalendar/timegrid/main.js') }}'></script>
    <script src='{{ asset('back/assets/vendor/fullcalendar/list/main.js') }}'></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('back/assets/js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('back/assets/js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('back/assets/js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('back/assets/js/chart-custom.js') }}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('back/assets/js/slider.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('back/assets/js/app.js') }}"></script>
</body>

</html>
