@extends('layouts.admin')

@section('title', 'Edit Data Mahasiswa')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Mahasiswa</h1>
    <a class="btn btn-primary" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="row">
            <div class="col-md-6">
                <img src="{{ asset("assets/img/mahasiswa/$mahasiswa->angkatan/$mahasiswa->foto") }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <form method="post" action="{{ url("admin/mahasiswa/edit/$mahasiswa->id") }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="nama" type="text" class="form-control @error('nama') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $mahasiswa->nama }}">
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
                        <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="tempat_lahir" type="text" class="form-control @error('tempat_lahir') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $mahasiswa->tempat_lahir }}">
                            @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $lahir = explode(", ", $mahasiswa->tanggal_lahir);
                        $tahunnn = $lahir[2];
                        $bulan = $lahir[1];
                        $tanggal = $lahir[0];
                    @endphp
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <div class="date">
                                <select class="year" name="tahun">
                                @foreach ($tahunLahir as $thnLahir)
                                    @if($tahunnn == $thnLahir)
                                        <option value="{{ $thnLahir }}" selected>{{ $thnLahir }}</option>
                                    @else
                                        <option value="{{ $thnLahir }}">{{ $thnLahir }}</option>
                                    @endif
                                @endforeach
                                </select>
                                <select class="month" name="bulan">
                                @foreach ($bulanLahir as $blnLahir)
                                    @if ($bulan == $blnLahir)
                                    <option value="{{ $blnLahir }}" selected>{{ $blnLahir }}</option>
                                    @else
                                    <option value="{{ $blnLahir }}">{{ $blnLahir }}</option>
                                    @endif
                                @endforeach
                                </select>
                                <select class="day" name="tanggal">
                                @foreach ($tanggalLahir as $tglLahir)
                                    @if ($tanggal == $tglLahir)
                                    <option value="{{ $tglLahir }}" selected>{{ $tglLahir }}</option>
                                    @else
                                    <option value="{{ $tglLahir }}">{{ $tglLahir }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Angkatan</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group mb-3">
                            <select name="angkatan" class="form-control">
                                @foreach ($tahun as $thn)
                                    @if($mahasiswa->angkatan == $thn)
                                        <option value="{{ $thn }}" selected>{{ $thn }}</option>
                                    @else
                                        <option value="{{ $thn }}">{{ $thn }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Asal</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="asal" type="text" class="form-control @error('asal') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $mahasiswa->asal }}">
                            @error('asal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
