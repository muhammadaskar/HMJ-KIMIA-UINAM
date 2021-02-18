@extends('layouts.admin')

@section('title', 'Info Akun Admin')

@section('section')
<div class="container-fluid">

    @if(session()->has('message'))
    <div class="flash-data" data-flashdata="{{ session('message') }}"></div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Info Akun</h1>
    <a class="btn btn-primary" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="row mt-3">
        <div class="col-md-6 align-items-center justify-content-center mx-auto d-block align-content-center">
            <h1 class="text-center"><i class="fas fa-fw fa-user"></i></h1>
            <div class="row">
                <div class="col-md-4">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <input name="name" type="text" class="form-control @error('name') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <input name="email" type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="exampleInputEmail1" class="form-label">Dibuat pada </label>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <input name="name" type="text" class="form-control @error('name') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= Carbon\Carbon::parse(auth()->user()->created_at)->isoFormat('dddd, D MMMM Y'); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8 mx-auto d-block align-content-center">
                    <a class="btn btn-success align-content-center" href=" {{ route('admin-ubah-profil') }} ">Ubah Profil</a>
                    <a class="btn btn-secondary align-content-center" href=" {{ route('admin-ubah-sandi') }} ">Ubah Sandi</a>
                    <a class="btn btn-danger align-content-center" href=" {{ route('hapus-akun-admin') }} " onclick="return confirm('Apakah Anda Yakin ?')">Hapus Akun</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
