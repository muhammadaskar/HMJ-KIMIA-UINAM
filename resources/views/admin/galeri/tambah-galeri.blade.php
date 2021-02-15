@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Galeri</h1>
    <a class="btn btn-primary" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="row mt-3">
        <div class="col-md-10">
            <form method="post" action="{{ route('post-tambah-galeri') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="judul" type="text" class="form-control @error('judul') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('judul') }}">
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Gambar</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="gambar" type="file">
                        </div>
                        <button type="submit" class="btn btn-success mx-auto d-block mb-3">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
