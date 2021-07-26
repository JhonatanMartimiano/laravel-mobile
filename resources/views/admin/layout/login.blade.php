<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>

    @includeSEO()

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ url(mix('admin/css/style.css')) }}" type="text/css"/>
    <script src="{{ url(mix('admin/js/script.js')) }}"></script>
</head>

<body class="skin-default card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
    </div>
</div>

<section id="wrapper" class="clearfix">
    @yield('content')
</section>

</body>
</html>
