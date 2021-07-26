<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>

    @includeSEO()

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ url(mix('admin/css/style.css')) }}" type="text/css"/>
    <script src="https://kit.fontawesome.com/79fe46618e.js" crossorigin="anonymous"></script>
    <script src="{{ url(mix('admin/js/script.js')) }}"></script>
</head>

<body class="skin-default-white fixed-layout">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
    </div>
</div>
<div id="main-wrapper">
    @include('admin.includes.nav')

    <section class="page-wrapper">
        <div class="loader-form">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Consultando dados...</p>
            </div>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    @include('admin.includes.footer')
</div>

</body>
</html>
