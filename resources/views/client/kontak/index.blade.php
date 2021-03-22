@extends('layouts.client')

@section('title', 'Kontak')

@section('main')
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header mt-3">
            <h1>Kontak</h1>
            <hr class="bg-dark mx-auto" style="width:100px; height:10px; border-radius: 7px 7px 7px 7px;">
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Alamat</h3>
                                <p class="text-justify">Universitas Islam Negeri Alauddin Makassar Fakultas Sains dan Teknologi.<br>Gedung Sekretariat Jl. H.M Yasin Limpo No.36 Samata, Kabupaten Gowa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Telepon</h3>
                            <p>085218853854</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>hmjkimiauinam01@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <i class="bi bi-instagram"></i>
                            <h3>Instagram</h3>
                            <p>@kimia_uinam</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <i class="bi bi-youtube"></i>
                            <h3>Youtube</h3>
                            <p>HMJ KIMIA UINAM</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <i class="bi bi-facebook"></i>
                            <h3>Facebook</h3>
                            <p>HMJ KIMIA UINAM</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.37547423768!2d119.49723641476447!3d-5.203539196224274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee3faad8f7479%3A0x700e300d6eecb489!2sJl.%20H.%20M%20Yasin%20Limpo%20No.36%2C%20Romangpolong%2C%20Kec.%20Somba%20Opu%2C%20Kabupaten%20Gowa%2C%20Sulawesi%20Selatan%2092113!5e0!3m2!1sen!2sid!4v1612788934328!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </div>

        </div>

        <div  class="row mt-3">
        <div  class="col-md-8">
        <h2 class="text-center">Kritik dan Saran</h2>
        
        <form action="javascript:void(0)">
        {{-- @csrf --}}
            <div class="form-group">
                {{-- <label for="exampleFormControlTextarea1">Kritik dan Saran</label> --}}
                <textarea id="kritik" name="kritik_saran" placeholder="silahkan masukkan kritik dan saran anda" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                @if (session()->has('gagal'))
                    <div class="row mt-1">
                        <div class="col-md-6">
                            <div class="alert alert-danger">
                            {{ session('gagal') }}
                            </div>
                        </div>
                    </div>
                @endif
                <button class="btn btn-primary mt-2 mx-auto d-block btn-submit" type="submit">Kirim</button>
            </div>
        </form>
        </div>

    </div>

</section>
<!-- End Contact Section -->

@endsection

@section('script')
<script type="text/javascript">
 $.ajaxSetup({
         headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var kritik = $("textarea[name=kritik_saran]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('kritik-saran.post') }}",
           data:{kritik_saran: kritik},
           success:function(data, res){
                $('#kritik').val('');
                if (data.success){
                Swal.fire({
                    title: 'Berhasil',
                    text: data.success,
                    type: 'success',
                    icon: 'success'
                })
                } else {
                    Swal.fire({
                    title: 'Gagal',
                    text: data.gagal,
                    icon: 'error'
                })
                }
           },
        })
  
    });

</script>
@endsection