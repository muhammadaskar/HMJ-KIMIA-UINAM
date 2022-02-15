@extends('layouts.client')

{{-- @section('title', 'Pengurus') --}}
<title> HMJ-KIMIA | Mahasiswa </title>

@section('main')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

    @if(session()->has('message'))
    {{-- <div class="flash-data" data-flashdata="{{ session('message') }}"></div> --}}
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Data Mahasiswa</strong>
            <small>just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
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
