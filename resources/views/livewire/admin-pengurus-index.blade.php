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
        @foreach ($penguruses as $pengurus)
        <div class="col-md-3 mb-1">
            <div class="card">
                <div class="card-header">
                    <a href="{{ asset("assets/img/pengurus/$pengurus->foto") }}" target="_blank">
                    @if($tahun == true)
                        <img class="mx-auto d-block" src="{{ asset("assets/img/pengurus/$pengurus->tahun_periode/$pengurus->foto") }}" style="max-height:80px;  max-width: 100px;" class="card-img-top" alt="...">
                    @else
                        <img class="mx-auto d-block" src="{{ asset("assets/img/pengurus/$pengurus->foto") }}" style="max-height:80px;  max-width: 100px;" class="card-img-top" alt="...">
                    @endif
                    </a>
                    <h6 class="text-center">{{ $pengurus->nama }}</h6>
                    {{-- <h5 class="card-title">{{ $pengurus->judul }}</h5> --}}
                </div>
                <div class="card-body">
                    <h5 class="text-center">{{ $pengurus->jabatan }}</h5>
                    <h4 class="text-center">{{ Str::title("$pengurus->divisi") }}</h4>
                    <div class="text-center">
                        <a href="{{ url("admin/pengurus/edit/$tahunPeriode/$pengurus->id") }}" class="badge badge-secondary align-align-items-center">edit</a>
                        <a href="{{ url("admin/pengurus/hapus/$tahunPeriode/$pengurus->id") }}" class="badge badge-danger text-white border border-light" onclick="return confirm('Apakah anda yakin?')">hapus</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if($penguruses->isEmpty())
        <div class="col-md-6 mx-auto d-block">
            <div class="alert alert-danger text-center">
                <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" style="max-width: 50%;">
                <h3>data tidak tersedia</h3>
            </div>
        </div>
        @endif
    </div>
    <div class="mx-auto d-block">
        {{ $penguruses->links() }}
    </div>
</div>
