<div>
    <div class="">
        <input wire:model="cari" type="text" class="form-control mt-1" style="width:300px;" placeholder="Cari...">
    </div>
    <div class="row mt-3">
        @foreach ($beritas as $berita)
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <h5 class="card-title">{{ $berita->judul }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><i class="far fa-calendar-alt"></i> <?= $berita->created_at->isoFormat('dddd, D MMMM Y'); ?> </p>
                    <a href="{{ url("admin/berita/$berita->slug") }}" class="badge badge-secondary">detail</a>
                    <a href="{{ url("admin/berita/edit/$berita->id") }}" class="badge badge-success">edit</a>
                    <a href="{{ url("admin/berita/hapus/$berita->id") }}" class="badge badge-danger">hapus</a>
                </div>
            </div>
        </div>
        @endforeach
        @if($beritas->isEmpty())
        <div class="col-md-6 mx-auto d-block">
            <div class="alert alert-danger text-center">
                berita tidak tersedia
            </div>
        </div>
        @endif
    </div>
    <div class="mx-auto d-block">
        {{ $beritas->links() }}
    </div>
</div>
