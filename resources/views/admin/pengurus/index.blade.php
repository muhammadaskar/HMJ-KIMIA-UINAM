@extends('layouts.admin')

@section('title', 'Admin | Pengurus')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengurus</h1>

    @if(session()->has('message'))
    <div class="flash-data" data-flashdata="{{ session('message') }}"></div>
    {{-- @elseif(session()->has('failed'))
    <div class="flash-data-failed" data-flashdata="{{ session('failed') }}">
</div> --}}
@endif

<div class="float-right">
    <a class="btn btn-danger" href="{{ route('hapus-pengurus') }}"><i class="far fa-trash-alt"></i> Hapus Data Pengurus</a>
    <a class="btn btn-primary" href=" {{ route('tambah-pengurus') }} "><i class="fas fa-plus"></i> Tambahkan Pengurus</a>
</div>


<livewire:admin-pengurus-index />

</div>
@endsection
