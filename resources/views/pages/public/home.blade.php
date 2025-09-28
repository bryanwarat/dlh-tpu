@extends('layouts.public.app')

@section('content')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/testimonial/test-bg.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="breadcrumb-wrap text-center">
                            <div class="breadcrumb-title mb-30">
                                <h2>Pricing</h2>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->


        <!-- services-area -->
        <section id="services" class="services-area services-bg services-two pt-100 pb-70">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon">
                                <div class="glyph-icon flaticon-gravestone"></div>
                            </div>
                            <div class="services-icon2">
                                <div class="glyph-icon flaticon-document"></div>
                            </div>
                            <div class="second-services-content">
                                <h5><a href="services-detail.html">Pemakaman Baru</a></h5>
                                <p>Layanan Pemakaman Baru</p>
                                <a href="#" class="btn2 mt-20">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon icon-f2">
                                <div class="glyph-icon flaticon-agreement"></div>
                            </div>
                            <div class="services-icon2">
                                <div class="glyph-icon flaticon-agreement"></div>
                            </div>
                            <div class="second-services-content">
                                <h5><a href="services-detail.html">Pencarian Makam</a></h5>
                                <p>Layanan Pencarian Makam</p>
                                <a href="#" class="btn2 mt-20">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon">
                                <div class="glyph-icon flaticon-edition"></div>
                            </div>
                            <div class="services-icon2">
                                <div class="glyph-icon flaticon-edition"></div>
                            </div>
                            <div class="second-services-content">
                                <h5><a href="services-detail.html">Mobil Jenazah</a></h5>
                                <p>Layanan Sewa Mobil Jenazah</p>
                                <a href="#" class="btn2 mt-20">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon">
                                <div class="glyph-icon flaticon-edition"></div>
                            </div>
                            <div class="services-icon2">
                                <div class="glyph-icon flaticon-edition"></div>
                            </div>
                            <div class="second-services-content">
                                <h5><a href="services-detail.html">Daftar TPU</a></h5>
                                <p>Daftar Tempat Pemakaman Umum</p>
                                <a href="#" class="btn2 mt-20">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
