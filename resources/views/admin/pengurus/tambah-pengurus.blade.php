@extends('layouts.admin')

@section('title', 'Tambah Pengurus')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Pengurus</h1>
    <a class="btn btn-primary" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="row mt-3">
        <div class="col-md-10">
            <form method="post" action="{{ route('post-tambah-pengurus') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="nama" type="text" class="form-control @error('nama') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama') }}">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Divisi</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group mb-3">
                            <select name="divisi" class="form-control" id="slct1" onchange="populate(this.id,'slct2')">
                                <option selected></option>
                                <option value="pengurus-harian">Pengurus Harian</option>
                                <option value="keorganisasian-dan-pengkaderan">Keorganisasian</option>
                                <option value="keilmuan">Keilmuan</option>
                                <option value="kerohanian">Kerohanian</option>
                                <option value="informasi-dan-komunikasi">Informasi dan Komunikasi</option>
                                <option value="dana-dan-usaha">Dana dan Usaha</option>
                                <option value="minat-dan-bakat">Minat dan Bakat</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group mb-3">
                            <select name="jabatan" class="form-control" id="slct2">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="gambar" type="file">
                        </div>
                        <button type="submit" class="btn btn-success mx-auto d-block mb-3" id="btn-one">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
