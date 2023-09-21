


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Page Not Found</title>

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
      <link rel="stylesheet" href="{{ asset('back/assets/vendor/mapbox/mapbox-gl.css') }}">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->

      <div class="wrapper">
      <div class="container">
         <div class="row no-gutters height-self-center">
            <div class="col-sm-12 text-center align-self-center">
               <div class="iq-error position-relative">
                    <img src="{{ asset('back/assets/images/error/404.png') }}" class="img-fluid iq-error-img" alt="">
                    <h2 class="mb-0 mt-4">Oops! This Page is Not Found.</h2>
                    <p>The requested page dose not exist.</p>
                    <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="{{ route('index') }}"><i class="ri-home-4-line"></i>Back to Home</a>
               </div>
            </div>
         </div>
   </div>
      </div>

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('back/assets/js/backend-bundle.min.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('back/assets/js/app.js') }}"></script>
  </body>
</html>
