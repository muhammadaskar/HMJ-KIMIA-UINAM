<div>
    <div class="row">

        <div class="col-lg-8 entries">

            @foreach ($beritas as $berita)
            <article class="entry bg-white">

                <div class="entry-img">
                    <img src="{{asset("assets/img/berita/$berita->gambar")}}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                    <a href="{{ url("berita/$berita->slug") }}">{{ $berita->judul }}</a>
                </h2>

                <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">Admin</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <?= Carbon\Carbon::parse($berita->created_at)->isoFormat('dddd, D MMMM Y'); ?></li>
                    </ul>
                </div>

                <div class="entry-content">
                    <div class="read-more">
                        <a href=" {{ url("berita/$berita->slug") }} ">Baca Selengkapnya</a>
                    </div>
                </div>

            </article><!-- End blog entry -->
            @endforeach

            @if($beritas->isEmpty())
            <div class="col-md-6 mx-auto d-block">
                <div class="alert alert-danger text-center">
                    berita tidak tersedia
                </div>
            </div>
            @endif

            <div class="justify-content-center">
                {{ $beritas->links() }}
            </div>

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

            <div class="sidebar">

                <h3 class="sidebar-title">Cari</h3>
                <div class="sidebar-item search-form">
                    <form action="">
                        <input wire:model="cari" type="text">
                        <button type="button"><i class="bi bi-search"></i></button>
                    </form>
                </div><!-- End sidebar search formn-->

            </div><!-- End sidebar -->

        </div>
        <!-- End blog sidebar -->

    </div>
</div>
