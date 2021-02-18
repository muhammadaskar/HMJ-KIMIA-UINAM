@extends('layouts.admin')

@section('title', 'Edit Akun Admin')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Akun Admin</h1>
    <a class="btn btn-primary" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="row mt-3">
        <div class="col-md-6 mx-auto d-block">
            <form method="post" action="{{ route('post-ubah-profil-admin') }}">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="name" type="text" class="form-control @error('name') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ auth()->user()->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="email" type="email" class="form-control @error('email') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ auth()->user()->email }}" readonly>
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
