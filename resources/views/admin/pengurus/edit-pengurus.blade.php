@extends('layouts.admin')

@section('title', 'Edit Pengurus')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Pengurus</h1>
    <a class="btn btn-primary" href=" {{ URL::previous() }} "><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="row mt-3">
        <div class="col-md-10">
            <img src="{{ asset("assets/img/pengurus/$pengurus->foto") }}" class="img-fluid mx-auto d-block mb-2" style="max-width:20%;">
            <form method="post" action="{{ url("admin/pengurus/edit/$pengurus->id") }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input name="nama" type="text" class="form-control @error('nama') @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $pengurus->nama }}">
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
                                <option></option>
                                <option value="pengurus-harian" @if($pengurus->divisi == 'pengurus-harian') selected @endif>Pengurus Harian</option>
                                <option value="keorganisasian-dan-pengkaderan" @if($pengurus->divisi == 'keorganisasian-dan-pengkaderan') selected @endif>Keorganisasian</option>
                                <option value="keilmuan" @if($pengurus->divisi == 'keilmuan') selected @endif>Keilmuan</option>
                                <option value="kerohanian" @if($pengurus->divisi == 'kerohanian') selected @endif>Kerohanian</option>
                                <option value="informasi-dan-komunikasi" @if($pengurus->divisi == 'informasi-dan-komunikasi') selected @endif>Informasi dan Komunikasi</option>
                                <option value="dana-dan-usaha" @if($pengurus->divisi == 'dana-dan-usaha') selected @endif>Dana dan Usaha</option>
                                <option value="minat-dan-bakat" @if($pengurus->divisi == 'minat-dan-bakat') selected @endif>Minat dan Bakat</option>
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
                                @if($pengurus->divisi == 'pengurus-harian')
                                <option value="Ketua Umum" @if($pengurus->jabatan == 'Ketua Umum') selected @endif>Ketua Umum</option>
                                <option value="Wakil Ketua I" @if($pengurus->jabatan == 'Wakil Ketua I') selected @endif>Wakil Ketua I</option>
                                <option value="Wakil Ketua II" @if($pengurus->jabatan == 'Wakil Ketua II') selected @endif>Wakil Ketua II</option>
                                <option value="Sekretaris Umum" @if($pengurus->jabatan == 'Sekretaris Umum') selected @endif>Sekretaris Umum</option>
                                <option value="Wakil Sekretaris I" @if($pengurus->jabatan == 'Wakil Sekretaris I') selected @endif>Wakil Sekretaris I</option>
                                <option value="Wakil Sekretaris II" @if($pengurus->jabatan == 'Wakil Sekretaris II') selected @endif>Wakil Sekretaris II</option>
                                <option value="Bendahara Umum" @if($pengurus->jabatan == 'Bendahara Umum') selected @endif>Bendahara Umum</option>
                                <option value="Wakil Bendahara" @if($pengurus->jabatan == 'Wakil Bendahara') selected @endif>Wakil Bendahara</option>
                                @else
                                <option value="Koordinator" @if($pengurus->jabatan == 'Koordinator') selected @endif>Koordinator</option>
                                <option value="Anggota" @if($pengurus->jabatan == 'Anggota') selected @endif>Anggota</option>
                                @endif
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
