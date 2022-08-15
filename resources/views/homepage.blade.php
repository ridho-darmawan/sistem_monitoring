<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Solar - Solar Energy Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template_homepage/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template_homepage/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template_homepage/css/style.css') }}" rel="stylesheet">
</head>

<body>


    <div class="container-fluid p-0" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="{{ asset('template_homepage/img/foto-kantor.jpg') }}" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">PENGADILAN AGAMA TEMBILAHAN</h4>
                            <h3 class="display-2 font-secondary text-white mb-4">Innovative Matter Solution For litigant</h3>
                            <a class="btn btn-light font-weight-bold py-3 px-5 mt-2 btn-scroll" href="{{ route('login.admin') }}">Masuk Sebagai Admin</a>
                            <a class="btn btn-light font-weight-bold py-3 px-5 mt-2 btn-scroll" href="{{ route('welcome') }}">Masuk Sebagai Pihak</a>
                        </div>
                    </div>
                </div>
               
         
        </div>
    </div>
  

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template_homepage/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template_homepage/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template_homepage/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template_homepage/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template_homepage/lib/lightbox/js/lightbox.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('template_homepage/js/main.js') }}"></script>
</body>

</html>