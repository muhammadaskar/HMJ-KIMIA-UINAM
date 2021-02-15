@extends('layouts.admin')

@section('title', 'Admin | Berita')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Berita</h1>

    @if(session()->has('message'))
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        </div>
    </div>
    @elseif(session()->has('failed'))
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>
        </div>
    </div>
    @endif

    <div class="float-right">
        <a class="btn btn-primary" href=" {{ route('tambah-berita') }} "><i class="fas fa-plus"></i> Tambahkan Berita</a>
    </div>


    <livewire:admin-berita-index />

</div>
@endsection
