<div>
    <div class="">
        <input wire:model="cari" type="text" class="form-control mt-1" style="width:300px;" placeholder="Cari...">
    </div>
    <div class="row mt-3">
        @foreach ($blogs as $blog)
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <h5 class="card-title">{{ $blog->judul }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><i class="far fa-calendar-alt"></i> <?= $blog->created_at->isoFormat('dddd, D MMMM Y'); ?> </p>
                    <a href="{{ url("admin/blog/$blog->slug") }}" class="badge badge-secondary">detail</a>
                    <a href="{{ url("admin/blog/edit/$blog->id") }}" class="badge badge-success">edit</a>
                    <a href="{{ url("admin/blog/hapus/$blog->id") }}" class="badge badge-danger" id="btn-two" onclick="return confirm('Apakah anda yakin ?')">hapus</a>
                </div>
            </div>
        </div>
        @endforeach
        @if($blogs->isEmpty())
        <div class="col-md-6 mx-auto d-block">
            <div class="alert alert-danger text-center">
                blog tidak tersedia
            </div>
        </div>
        @endif
    </div>
    <div class="mx-auto d-block">
        {{ $blogs->links() }}
    </div>
</div>
