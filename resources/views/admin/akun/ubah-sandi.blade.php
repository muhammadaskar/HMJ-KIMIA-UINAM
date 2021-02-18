@extends('layouts.admin')

@section('title', 'Ubah Kata Sandi')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Kata Sandi</h1>
    <a class="btn btn-primary" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="row mt-3">
        <div class="col-md-6 mx-auto d-block">
            @if(session()->has('failed'))
            <div class="row">
                <div class="col-md-6 mx-auto d-block">
                    <div class="alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                </div>
            </div>
            @endif

            <form method="post" action="{{ route('post-ubah-sandi-admin') }}">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Sandi Lama</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="sandiLama" type="password" class="form-control" id="exampleInputsandiLama1" aria-describedby="sandiLamaHelp">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Sandi Baru</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="password" type="password" class="form-control" id="exampleInputpassword1" aria-describedby="passwordHelp">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Konfirmasi Sandi Baru</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="password_confirmation" type="password" class="form-control" id=" password-confirm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success mx-auto d-block mb-3" id="btn-one">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
