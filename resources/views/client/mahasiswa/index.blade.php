@extends('layouts.client')

{{-- @section('title', 'Pengurus') --}}
<title> HMJ-KIMIA | Mahasiswa </title>

@section('main')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

    @if(session()->has('message'))
    <div class="alert alert-success mt-3" role="alert">
      {{ session('message') }}
    </div>
    @endif

        {{-- <header class="section-header mt-4">
            <h1>{{ $divisi->nama }}</h1>
            <hr class="bg-dark mx-auto" style="width:150px; height:10px; border-radius: 7px 7px 7px 7px;">
        </header>

        <div class="row gy-4" data-aos="fade-left">
            <div class="col-md-12">
                <?= $divisi->deskripsi ?>
            </div>
        </div> --}}


        
        <livewire:client-mahasiswa-index/>
    </div>

</section>
<!-- End Pricing Section -->
@endsection
