@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-2">
        <a class="btn btn-sm btn-primary pt-2" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>
        <h1 class="h3 ml-3 text-gray-800">Edit Blog</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <img src="{{ asset("assets/img/blog/$blog->gambar") }}" class="mx-auto d-block img-fluid" alt="..." style="width:40%;">
        </div>
        <div class="card-body">
            <form method="post" action="{{ url("admin/blog/edit/$blog->id") }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Judul Blog</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="judul" type="text" class="form-control @error('judul') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $blog->judul }}">
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
                        <label for="exampleInputEmail1" class="form-label">Isi Blog</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <textarea class="@error('isi') @enderror form-control" name="isi" id="konten" rows="2" column="2">{{ $blog->isi }}</textarea>
                            @error('isi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Gambar Blog</label>
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
