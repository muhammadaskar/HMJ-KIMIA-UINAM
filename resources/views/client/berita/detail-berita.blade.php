@extends('layouts.client')
<?php $title = $berita->judul; ?>

{{-- @section('title', "{{ $title }}") --}}
<title> {{ $title }} </title>

@section('main')
<main id="main">

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{asset("assets/img/berita/$berita->gambar")}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">{{$berita->judul}}
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">Admin</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i><?= Carbon\Carbon::parse($berita->created_at)->isoFormat('dddd, D MMMM Y'); ?></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <div class="text-justify">
                                <?= $berita->isi ?>
                            </div>

                        </div>

                        {{-- <div class="entry-footer">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div> --}}

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Cari</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->


                        <h3 class="sidebar-title">Berita Terbaru</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach ($beritas as $b)
                            @if($b->id != $berita->id)
                            <div class="post-item clearfix">
                                <img src="{{asset("assets/img/berita/$b->gambar")}}" alt="">
                                <h4><a href=" {{ url("berita/$b->slug") }} ">{{ $b->judul }}</a></h4>
                                <time datetime="2020-01-01"><?= Carbon\Carbon::parse($b->created_at)->isoFormat('dddd, D MMMM Y'); ?></time>
                            </div>
                            @endif
                            @endforeach

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

</main>
<!-- End #main -->
@endsection
