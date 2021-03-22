@extends('layouts.admin')

@section('title', 'Admin | Krtik dan Saran')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kritik dan Saran</h1>

    {{-- @if(session()->has('message'))
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
    @endif --}}

    {{-- <div class="float-right">
        <a class="btn btn-primary" href=" {{ route('tambah-blog') }} "><i class="fas fa-plus"></i> Tambahkan Blog</a>
    </div> --}}


    <livewire:admin-kritik-saran-index />

</div>
@endsection
