@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-2">
        <a class="btn btn-sm btn-primary pt-2" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>
        <h1 class="h3 ml-3 text-gray-800">Detail Berita</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <img src="{{ asset("assets/img/berita/$berita->gambar") }}" class="mx-auto d-block img-fluid" alt="..." style="width:40%;">
            <h5 class="card-title">{{ $berita->judul }}</h5>
            <p class="card-title"><i class="far fa-calendar-alt"></i> <?= Carbon\Carbon::parse($berita->created_at)->isoFormat('dddd, D MMMM Y'); ?> </p>
        </div>
        <div class="card-body">
            <div class="text-justify">
                <?= $berita->isi ?>
            </div>
        </div>
    </div>

</div>
@endsection
