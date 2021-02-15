@extends('layouts.client')

@section('title', 'Tentang')

@section('main')
<!-- ======= Features Section ======= -->
<section id="features" class="features" style="background:#FFFFFF;">

    <div class="container" data-aos="fade-up">

        <header class="section-header mt-3">
            <h1>Tentang Himpunan</h1>
            <hr class="bg-dark mx-auto" style="width:350px; height:10px; border-radius: 7px 7px 7px 7px;">
        </header>


        <!-- Feature Tabs -->
        <div class="row feture-tabs" data-aos="fade-up">
            <div class="col-lg-6">
                {{-- <h3>Neque officiis dolore maiores et exercitationem quae est seda lidera pat claero</h3> --}}

                <!-- Tabs -->
                <ul class="nav nav-pills mb-3">
                    <li>
                        <a class="nav-link active" data-bs-toggle="pill" href="#tentang">Tentang</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tujuan">Tujuan</a>
                    </li>
                </ul><!-- End Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tentang">
                        <ul>
                            <li>
                                <p class="text-justify"><strong>
                                        HMJ-KIMIA FST UIN ALAUDDIN MAKASSAR
                                    </strong> didirikan pada bulan Oktober 2006 yang bernama HMJ Karteker dalam ruang lingkup Fakultas Sains dan Teknologi UIN Alauddin Makassar.</p>
                            </li>
                            <li>
                                <p class="text-justify"><strong>
                                        HMJ-KIMIA FST UIN ALAUDDIN MAKASSAR
                                    </strong> adalah Organisasi yang menghimpun Mahasiswa Jurusan Kimia Fakultas Sains dan Teknologi Universitas Islam Negeri Alauddin Makassar.</p>
                            </li>
                            <li>
                                <p class="text-justify"><strong>
                                        HMJ-KIMIA FST UIN ALAUDDIN MAKASSAR
                                    </strong> berfungsi sebagai wadah komunikasi, integrasi, advokasi, penelitian, dan penyalur aspirasi Mahasiswa Jurusan Kimia Fakultas Sains dan Teknologi Universitas Islam Negeri Alauddin Makassar.</p>
                            </li>
                        </ul>
                    </div><!-- End Tab 1 Content -->

                    <div class="tab-pane fade show" id="tujuan">
                        <ol>
                            <li>
                                <p class="text-justify">Meningkatkan intelektualitas Mahasiswa Jurusan Kimia Fakultas Sains dan Teknologi Universitas Islam Negeri Alauddin Makassar yang bertakwa kepada Tuhan Yang Maha Esa dan berwawasan sosial.</p>
                            </li>
                            <li>
                                <p class="text-justify">Mengembangkan kegiatan keilmuan dikalangan Mahasiswa Kimia Fakultas Sains dan Teknologi Universitas Islam Negeri Alauddin Makassar.</p>
                            </li>
                            <li>
                                <p class="text-justify">Meningkatkan potensi dan kreativitas Mahasiswa Jurusan Kimia Fakultas Sains dan Teknologi Universitas Islam Negeri Alauddin Makassar.</p>
                            </li>
                            <li>
                                <p class="text-justify">Membina dan mengembangkan kebersamaan antar Mahasiswa Jurusan Kimia Fakultas Sains dan Teknologi Universitas Islam Negeri Alauddin Makassar.</p>
                            </li>
                        </ol>
                    </div><!-- End Tab 2 Content -->

                </div>

            </div>

            <div class="col-lg-6">
                <img src="{{asset("assets/img/logo/logo-hmj.png")}}" class="img-fluid mx-auto d-block logo-hmjk" alt="" style="width:60%;">
            </div>

        </div><!-- End Feature Tabs -->

    </div>

</section>
<!-- End Features Section -->
@endsection
