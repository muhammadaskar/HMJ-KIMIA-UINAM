@extends('layouts.admin')

@section('title', 'Admin | Galeri')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Galeri</h1>



    <div class="float-right">
        <a class="btn btn-primary" href=" {{ route('tambah-galeri') }} "><i class="fas fa-plus"></i> Tambahkan Galeri</a>
    </div>


    <livewire:admin-galeri-index />

</div>
@endsection
