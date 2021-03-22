<div>
    <div class="row mt-3">
        @foreach ($sarans as $saran)
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $saran->kritik_saran }}</h5>
                </div>
                <div class="card-footer">
                    <p class="card-text"><i class="far fa-calendar-alt"></i> <?= $saran->created_at->isoFormat('dddd, D MMMM Y'); ?> </p>
                    {{-- <a href="{{ url("admin/saran/hapus/$saran->id") }}" class="badge badge-danger" id="btn-two" onclick="return confirm('Apakah anda yakin ?')">hapus</a> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mx-auto d-block">
        {{ $sarans->links() }}
    </div>
</div>
