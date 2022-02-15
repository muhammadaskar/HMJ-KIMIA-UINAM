@extends('layouts.admin')

@section('title', 'Admin | Pengurus')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengurus {{ $tahunPeriode }}</h1>

    @if(session()->has('message'))
    <div class="flash-data" data-flashdata="{{ session('message') }}"></div>
    {{-- @elseif(session()->has('failed'))
    <div class="flash-data-failed" data-flashdata="{{ session('failed') }}">
</div> --}}
@endif

<div class="float-right">
    <a class="btn btn-danger" href="{{ url("/admin/pengurus/$tahunPeriode/hapus-pengurus") }}"><i class="far fa-trash-alt"></i> Hapus Data Pengurus</a>
    <a class="btn btn-primary" href=" {{ url("admin/tambah-pengurus/$tahunPeriode") }} "><i class="fas fa-plus"></i> Tambahkan Pengurus</a>
</div>


<livewire:admin-pengurus-index :tahun="$tahunPeriode"/>

</div>
@endsection
