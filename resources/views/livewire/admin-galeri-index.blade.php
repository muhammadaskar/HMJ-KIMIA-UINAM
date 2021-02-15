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

    @if(session()->has('message'))
    <div class="flash-data" data-flashdata="{{ session('message') }}"></div>
    @elseif(session()->has('failed'))
    <div class="flash-data-failed" data-flashdata="{{ session('failed') }}"></div>
    @endif
    <div class="row mt-3">
        @foreach ($galeris as $galeri)
        <div class="col-md-3 mb-1">
            <div class="card">
                <div class="card-header">
                    <a href="{{ asset("assets/img/galeri/$galeri->gambar") }}" target="_blank">
                        <img src="{{ asset("assets/img/galeri/$galeri->gambar") }}" style="max-height:100px;" class="card-img-top" alt="...">
                    </a>
                    {{-- <h5 class="card-title">{{ $galeri->judul }}</h5> --}}
                </div>
                <div class="card-body">
                    {{-- <p class="card-text"><i class="far fa-calendar-alt"></i> <?= $galeri->created_at->isoFormat('dddd, D MMMM Y'); ?> </p> --}}
                    {{-- <a href="{{ url("admin/galeri/hapus/$galeri->id") }}" class="badge badge-danger">hapus</a> --}}
                    <button wire:click="hapusFoto({{ $galeri->id }})" class="badge badge-danger text-white border border-light" onclick="return conform('Apakah anda yakin?')">hapus</button>
                </div>
            </div>
        </div>
        @endforeach
        @if($galeris->isEmpty())
        <div class="col-md-6 mx-auto d-block">
            <div class="alert alert-danger text-center">
                <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" style="max-width: 50%;">
                <h3>foto tidak tersedia</h3>
            </div>
        </div>
        @endif
    </div>
    <div class="mx-auto d-block">
        {{ $galeris->links() }}
    </div>
</div>
