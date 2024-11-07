<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="assets/landing/fonts/icomoon/style.css">

  <link rel="stylesheet" href="assets/landing/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/landing/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/landing/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/landing/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/landing/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="assets/landing/css/aos.css">

  <link rel="stylesheet" href="assets/landing/css/style.css">

</head>

<body>
    <div id="app">
        <div class="site-wrap">
            <div class="site-navbar py-2">
                <div class="search-wrap">
                    <div class="container">
                        <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                        <form action="#" method="post">
                            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                        </form>
                    </div>
                </div>
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <div class="site-logo">
                                <a href="index.html" class="js-logo-clone">Pharma</a>
                            </div>
                        </div>
                        <div class="main-nav d-none d-lg-block">
                            @include('includes.nav')
                        </div>
                        <div class="icons">
                            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <main class="py-1">
            @yield('content')
        </main>
        @include('includes.footer')
    </div>
    <script src="assets/landing/js/jquery-3.3.1.min.js"></script>
    <script src="assets/landing/js/jquery-ui.js"></script>
    <script src="assets/landing/js/popper.min.js"></script>
    <script src="assets/landing/js/bootstrap.min.js"></script>
    <script src="assets/landing/js/owl.carousel.min.js"></script>
    <script src="assets/landing/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/landing/js/aos.js"></script>
    <script src="assets/landing/js/main.js"></script>
</body>
</html>
