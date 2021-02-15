<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, user-scalable=no">


    <title> @yield('title') </title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset("assets/img/logo/logo-hmj.png")}}" rel="icon">
    <link href="{{asset("assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/aos/aos.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/glightbox/css/glightbox.min.css")}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@200&display=swap" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">
    @livewireStyles

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="100">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ url('/#beranda') }}" class="logo d-flex align-items-center">
                <img src="{{asset("assets/img/logo/logo-hmj.png")}}" alt="">
                <div class="logo-hmj">
                    <span>HMJ-KIMIA</span>
                </div>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto @if($page == 'beranda') active @endif" href="{{ url('/') }}">Beranda</a></li>
                    <li class="dropdown @if($page == 'berita' || $page == 'blog') active @endif"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down "></i></a>
                        <ul>
                            <li><a href=" {{ url('/berita/#berita') }} ">Berita</a></li>
                            <li><a href=" {{ url('/blog/#blog') }} ">Blog</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto @if($page == 'galeri') active @endif" href=" {{ route('galeri') }} ">Galeri</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#about">About</a></li> --}}
                    {{-- <li><a class="nav-link scrollto" href="#services">Services</a></li> --}}
                    {{-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> --}}
                    {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
                    {{-- <li><a href="blog.html">Blog</a></li> --}}
                    <li class="dropdown"><a href="#"><span>Pengurus</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href=" {{ url('pengurus/pengurus-harian') }} ">Pengurus Harian</a></li>
                            <li><a href="{{url("pengurus/keorganisasian-dan-pengkaderan")}}">Keorganisasian</a></li>
                            <li><a href="{{url("pengurus/keilmuan")}}">Keilmuan</a></li>
                            <li><a href="{{url("pengurus/kerohanian")}}">Kerohanian</a></li>
                            <li><a href="{{url("pengurus/informasi-dan-komunikasi")}}">Informasi dan Komunikasi</a></li>
                            <li><a href="{{url("pengurus/dana-dan-usaha")}}">Dana dan Usaha</a></li>
                            <li><a href="{{url("pengurus/minat-dan-bakat")}}">Minat dan Bakat</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto @if($page =='tentang') active @endif" href=" {{ url('tentang') }} ">Tentang</a></li>
                    <li><a class="nav-link scrollto" href=" {{ url('kontak') }} ">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('header')
    @yield('main')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        {{-- <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="#" class="logo d-flex align-items-center">
                            <img src="{{asset("assets/img/logo/UIN.png")}}" alt="">
                            <img src="{{asset("assets/img/logo/logo-hmj.png")}}" alt="">
                            <span>HMJ-KIMIA</span>
                        </a>
                        <p>HMJ-KIMIA FST UIN ALAUDDIN MAKASSAR adalah Organisasi yang menghimpun Mahasiswa Jurusan Kimia Fakultas Sains dan Teknologi Universitas Islam Negeri Alauddin Makassar.</p>
                        <div class="social-links mt-3">
                            {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> --}}
                            <a href="https://www.facebook.com/kimiauinam" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/kimia_uinam/" class="instagram" target="_blank"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCQ4sVeYoneaYgBx0HVjyZYw" class="youtube" target="_blank"><i class="bi bi-youtube bx bxl-youtube"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-12 footer-links">
                        <h4>Link Terkait</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="https://www.uin-alauddin.ac.id/" target="_blank">UIN ALAUDDIN MAKASSAR</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="http://fst.uin-alauddin.ac.id/" target="_blank">FAKULTAS SAINS & TEKNOLOGI</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="http://kim.fst.uin-alauddin.ac.id/" target="_blank">JURUSAN KIMIA</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                        <h4>Kontak Kami</h4>
                        <p>
                            Universitas Islam Negeri Alauddin Makassar Fakultas Sains dan Teknologi.
                            Gedung Sekretariat Jl. H.M Yasin Limpo No.36 Samata, Kabupaten Gowa.<br>
                            <strong>Phone:</strong> 085218853854<br>
                            <strong>Email:</strong> hmjkimiauinam01@gmail.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Developed by <a href="https://muhammadaskar.github.io/" target="_blank">Muhammad Askar</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset("assets/vendor/bootstrap/js/bootstrap.bundle.js")}}"></script>
    <script src="{{asset("assets/vendor/aos/aos.js")}}"></script>
    {{-- <script src="{{asset("assets/vendor/php-email-form/validate.js")}}"></script> --}}
    <script src="{{asset("assets/vendor/swiper/swiper-bundle.min.js")}}"></script>
    <script src="{{asset("assets/vendor/purecounter/purecounter.js")}}"></script>
    <script src="{{asset("assets/vendor/isotope-layout/isotope.pkgd.min.js")}}"></script>
    <script src="{{asset("assets/vendor/glightbox/js/glightbox.min.js")}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset("assets/js/main.js")}}"></script>

    @livewireScripts

</body>

</html>
