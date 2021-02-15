@extends('layouts.client')

{{-- @section('title', 'Pengurus') --}}
<title> HMJ-KIMIA | <?= $divisi->nama; ?> </title>

@section('main')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

        <header class="section-header mt-4">
            <h1>{{ $divisi->nama }}</h1>
            <hr class="bg-dark mx-auto" style="width:150px; height:10px; border-radius: 7px 7px 7px 7px;">
        </header>

        <div class="row gy-4" data-aos="fade-left">
            <div class="col-md-12">
                <?= $divisi->deskripsi ?>
            </div>
        </div>

        {{-- KETUA UMUM ATAU KORDINATOR --}}
        @foreach ($penguruses as $pengurus)
        @if($pengurus->jabatan == 'Ketua Umum' || $pengurus->jabatan == 'Koordinator')
        <div class="row mt-2 gy-4" data-aos="fade-left">
            <div class="col-lg-3 col-md-6 mx-auto d-block" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                    <h4>{{ $pengurus->nama }}</h4>
                    <img src="{{asset("assets/img/pengurus/$pengurus->foto")}}" class="img-fluid" alt="">
                    <h3>{{ $pengurus->jabatan }}</h3>
                </div>
            </div>
        </div>
        @endif
        @endforeach

        <div class="row gy-4 mt-3" data-aos="fade-left">
            @foreach ($penguruses as $pengurus)
            @if($pengurus->jabatan != 'Ketua Umum' && $pengurus->jabatan != 'Koordinator')
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                    <h4> {{ $pengurus->nama }} </h4>
                    <img src="{{asset("assets/img/pengurus/$pengurus->foto")}}" class="img-fluid" alt="">
                    <h3>{{ $pengurus->jabatan }}</h3>
                </div>
            </div>
            @endif
            @endforeach

        </div>

    </div>

</section>
<!-- End Pricing Section -->
@endsection
