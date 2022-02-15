<div>
    <div class="">
        <input wire:model="cari" type="text" class="form-control mt-1" style="width:300px;" placeholder="Cari...">
    </div>
    @if(session()->has('success-delete'))
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="alert alert-success">
                {{ session('success-delete') }}
            </div>
        </div>
    </div>
    @endif


    <div class="row mt-3">
        @foreach ($mahasiswas as $mahasiswa)
        <div class="col-md-3 mb-1">
            <div class="card">
                <div class="card-header">
                    <a href="{{ asset("assets/img/pengurus/$mahasiswa->foto") }}" target="_blank">
                    @php
                        $lahir = explode(", ", $mahasiswa->tanggal_lahir);
                        $tahun = $lahir[2];
                    @endphp
                        <img class="mx-auto d-block" src="{{ asset("assets/img/mahasiswa/$mahasiswa->angkatan/$mahasiswa->foto") }}" style="max-height:80px;  max-width: 100px;" class="card-img-top" alt="...">
                    </a>
                    <h6 class="text-center">{{ $mahasiswa->nama }}</h6>
                    {{-- <h5 class="card-title">{{ $mahasiswa->judul }}</h5> --}}
                </div>
                <div class="card-body">
                    <h5 class="text-center">{{ $mahasiswa->tempat_lahir }}</h5>
                    <h4 class="text-center">{{ Str::title("$mahasiswa->tanggal_lahir") }}</h4>
                    @if($mahasiswa->status == 0)
                        <h6 class="text-center">Status Akun: <span class="text-warning">belum aktif</span></h6>
                    @elseif($mahasiswa->status == 1)
                        <h6 class="text-center">Status Akun: <span class="text-success">aktif</span></h6>
                    @endif
                    <div class="text-center">
                    @if($mahasiswa->status == 0)
                        <a href="{{ url("admin/mahasiswa/aktifkan/$mahasiswa->id") }}" class="badge badge-success align-align-items-center">aktifkan</a>
                    @elseif($mahasiswa->status == 1)
                        <a href="{{ url("admin/mahasiswa/non-aktifkan/$mahasiswa->id") }}" class="badge badge-warning align-align-items-center">non-aktifkan</a>
                    @endif
                        <a href="{{ url("admin/mahasiswa/edit/$mahasiswa->id") }}" class="badge badge-secondary align-align-items-center">edit</a>
                        <a href="{{ url("admin/mahasiswa/hapus/$mahasiswa->id") }}" class="badge badge-danger text-white border border-light" onclick="return confirm('Apakah anda yakin?')">hapus</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if($mahasiswas->isEmpty())
        <div class="col-md-6 mx-auto d-block">
            <div class="alert alert-danger text-center">
                <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" style="max-width: 50%;">
                <h3>data tidak tersedia</h3>
            </div>
        </div>
        @endif
    </div>
    <div class="mx-auto d-block">
        {{ $mahasiswas->links() }}
    </div>
</div>
