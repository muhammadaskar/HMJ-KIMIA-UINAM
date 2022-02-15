@extends('layouts.admin')

@section('title', 'Admin | Mahasiswa')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>

    @if(session()->has('message'))
    <div class="flash-data" data-flashdata="{{ session('message') }}"></div>
    {{-- @elseif(session()->has('failed'))
    <div class="flash-data-failed" data-flashdata="{{ session('failed') }}">
</div> --}}
@endif

<div class="float-right">
    <a class="btn btn-primary" href=" {{ url("admin/tambah-mahasiswa") }} "><i class="fas fa-plus"></i> Tambah Data Mahasiswa</a>
</div>


<livewire:admin-mahasiswa-index/>

</div>
@endsection
