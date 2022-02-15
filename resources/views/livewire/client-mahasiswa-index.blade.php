<div>
    <div class="">
        <input wire:model="cari" type="text" class="form-control mt-5" style="width:260px;" placeholder="Cari...">
    </div>
    <div class="row gy-4 mt-2">
    {{-- @foreach ($mahasiswas as $mahasiswa)
        @if($mahasiswa->status == true)
        <div class="col-lg-3 col-md-6">
            <div class="box">
                <h4> {{ $mahasiswa->nama }} </h4>
                <img src="{{asset("assets/img/mahasiswa/$mahasiswa->angkatan/$mahasiswa->foto") }}" class="img-fluid" alt="">
                <h3>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</h3>
                <h3>{{ $mahasiswa->angkatan }}</h3>
                <h3>{{ $mahasiswa->asal }}</h3>
            </div>
        </div>
        @endif
    @endforeach --}}
    @foreach ($mahasiswas as $mahasiswa)
        @if($mahasiswa->status == true)
        <div class="col-lg-3 col-md-12">
            <div class="box">
                {{-- <div class="col-md"> --}}
                {{-- </div>
                <div class="col-md"> --}}
                    <h4> {{ $mahasiswa->nama }} </h4>
                    <img width="80%" height="80%"src="{{asset("assets/img/mahasiswa/$mahasiswa->angkatan/$mahasiswa->foto") }}" class="img-fluid rounded-circle" alt="">
                    <h4>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</h4>
                    <h3>{{ $mahasiswa->angkatan }}</h3>
                    <h3>{{ $mahasiswa->asal }}</h3>
                {{-- </div> --}}
            </div>
        </div>
        @endif
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
    <div class="mx-auto mt-2 d-block">
        {{ $mahasiswas->links() }}
    </div>
</div>
