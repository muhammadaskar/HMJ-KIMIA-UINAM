<div>
    <div class="row">

        <div class="col-lg-8 entries">

            @foreach ($blogs as $blog)
            <article class="entry bg-white">

                <div class="entry-img">

                </div>

                <h2 class="entry-title">
                    <a href="{{ url("blog/$blog->slug") }}">{{ $blog->judul }}</a>
                </h2>

                <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ url("blog/$blog->slug") }}">Admin</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <?= Carbon\Carbon::parse($blog->created_at)->isoFormat('dddd, D MMMM Y'); ?></li>
                    </ul>
                </div>

                <div class="entry-content">
                    <div class="read-more">
                        <a href="{{ url("blog/$blog->slug") }}">Baca Selengkapnya</a>
                    </div>
                </div>

            </article>
            @endforeach
            <!-- End blog entry -->

            @if($blogs->isEmpty())
            <div class="col-md-6 mx-auto d-block">
                <div class="alert alert-danger text-center">
                    Blog tidak tersedia
                </div>
            </div>
            @endif

            <div class="justify-content-center">
                {{ $blogs->links() }}
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

                {{-- <h3 class="sidebar-title">Recent Posts</h3>
                <div class="sidebar-item recent-posts">
                    <div class="post-item clearfix">

                        <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                        <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>

                    <div class="post-item clearfix">

                        <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                        <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>

                    <div class="post-item clearfix">

                        <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                        <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>

                    <div class="post-item clearfix">

                        <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                        <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>

                    <div class="post-item clearfix">

                        <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                        <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>

                </div> --}}
                <!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

    </div>
</div>
