<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA - @yield('title') </title>


    <link rel="stylesheet" href="css/vendor.css" />
    <link rel="stylesheet" href="css/app.css" />

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

  <script>
      window.scheduler = window.scheduler || {!! \App\Info\Facades\Info::toJson() !!}
  </script>
  <script src="https://checkout.stripe.com/checkout.js"></script>
<script src="js/app.js" type="text/javascript"></script>

@stack('scripts')

</body>
</html>
