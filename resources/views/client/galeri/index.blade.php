@extends('layouts.client')

@section('title', 'Galeri')

@section('main')
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

        <header class="section-header mt-5">
            <h1>Galeri</h1>
            <hr class="bg-dark mx-auto" style="width:150px; height:10px; border-radius: 7px 7px 7px 7px;">
            {{-- <p>Check our latest work</p> --}}
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Semua</li>
                    <li data-filter=".seminar">Seminar</li>
                    <li data-filter=".hari-besar-islami">Hari Besar Islami</li>
                    <li data-filter=".alkali-contest">Alkali Contest</li>
                    <li data-filter=".lainnya">Lainnya</li>
                </ul>
            </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

            @foreach ($galeris as $galeri)

            @if($galeri->kategori == 'seminar')
            <div class="col-lg-4 col-md-6 portfolio-item seminar">
                <div class="portfolio-wrap">
                    <div class="img-galeri">
                        <img src="{{asset("assets/img/galeri/$galeri->gambar")}}" class="img-fluid" alt="">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $galeri->judul }}</h4>
                        {{-- <p>App</p> --}}
                        <div class="portfolio-links">
                            <a href="assets/img/galeri/{{ $galeri->gambar }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $galeri->judul }}"><i class="ri-eye-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($galeri->kategori == 'hari-besar-islami')
            <div class="col-lg-4 col-md-6 portfolio-item hari-besar-islami">
                <div class="portfolio-wrap">
                    <div class="img-galeri">
                        <img src="{{asset("assets/img/galeri/$galeri->gambar")}}" class="img-fluid" alt="">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $galeri->judul }}</h4>
                        {{-- <p>App</p> --}}
                        <div class="portfolio-links">
                            <a href="assets/img/galeri/{{ $galeri->gambar }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $galeri->judul }}"><i class="ri-eye-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($galeri->kategori == 'alkali-contest')
            <div class="col-lg-4 col-md-6 portfolio-item alkali-contest">
                <div class="portfolio-wrap">
                    <div class="img-galeri">
                        <img src="{{asset("assets/img/galeri/$galeri->gambar")}}" class="img-fluid" alt="">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $galeri->judul }}</h4>
                        {{-- <p>App</p> --}}
                        <div class="portfolio-links">
                            <a href="assets/img/galeri/{{ $galeri->gambar }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $galeri->judul }}"><i class="ri-eye-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($galeri->kategori == 'lainnya')
            <div class="col-lg-4 col-md-6 portfolio-item lainnya">
                <div class="portfolio-wrap">
                    <div class="img-galeri">
                        <img src="{{asset("assets/img/galeri/$galeri->gambar")}}" class="img-fluid" alt="">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $galeri->judul }}</h4>
                        {{-- <p>App</p> --}}
                        <div class="portfolio-links">
                            <a href="assets/img/galeri/{{ $galeri->gambar }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $galeri->judul }}"><i class="ri-eye-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <div class="img-galeri">
                        <img src="{{asset("assets/img/galeri/$galeri->gambar")}}" class="img-fluid" alt="">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $galeri->judul }}</h4>
                        {{-- <p>App</p> --}}
                        <div class="portfolio-links">
                            <a href="assets/img/galeri/{{ $galeri->gambar }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $galeri->judul }}"><i class="ri-eye-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @endforeach

            {{ $galeris->links() }}

        </div>

    </div>

</section>
<!-- End Portfolio Section -->
@endsection
