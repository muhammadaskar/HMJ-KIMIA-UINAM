@extends('layouts.client')

@section('title', 'Berita')

@section('main')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            {{-- <ol>
                <li class="text-dark"><a href="{{ url('/#beranda') }}">Beranda</a></li>
            <li>Berita</li>
            </ol>
            <h2>Berita</h2> --}}

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="berita" class="blog">
        <div class="container" data-aos="fade-up">

            <livewire:client-berita-index />



        </div>
    </section><!-- End Blog Section -->

</main>
<!-- End #main -->
@endsection
