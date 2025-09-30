@extends('layouts.public.app')

@section('content')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex align-items-center"
            style="background-image:url('{{ asset('assets/public/img/testimonial/test-bg.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-wrap text-center">
                            <div class="breadcrumb-title mb-30">
                                <h2>SI ALPHA</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- services-area -->
        <section id="layanan" class="services-area services-bg services-two pt-100 pb-70">
            <div class="container">

                <div class="row">
                    <div class="section-title cta-title  mb-20">
                        <h2>Layanan Kami</h2>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon">
                                {{-- <div class="glyph-icon flaticon-gravestone"></div> --}}
                            </div>
                            <div class="services-icon2">
                                {{-- <div class="glyph-icon flaticon-document"></div> --}}
                            </div>
                            <div class="second-services-content">
                                <h5><a href="{{ route('publics.reservation.index') }}">Pemakaman Baru</a></h5>
                                <p>Layanan Pemakaman Baru</p>
                                <a href="{{ route('publics.reservation.index') }}" class="btn2 mt-20">Buka Layanan <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon">
                                {{-- <div class="glyph-icon flaticon-edition"></div> --}}
                            </div>
                            <div class="services-icon2">
                                {{-- <div class="glyph-icon flaticon-edition"></div> --}}
                            </div>
                            <div class="second-services-content">
                                <h5><a href="{{ route('publics.carrental.index') }}">Mobil Jenazah</a></h5>
                                <p>Layanan Sewa Mobil Jenazah</p>
                                <a href="{{ route('publics.carrental.index') }}" class="btn2 mt-20">Buka Layanan <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon">
                                {{-- <div class="glyph-icon flaticon-edition"></div> --}}
                            </div>
                            <div class="services-icon2">
                                {{-- <div class="glyph-icon flaticon-edition"></div> --}}
                            </div>
                            <div class="second-services-content">
                                <h5><a href="{{ route('publics.cemetery.index') }}">Informasi TPU</a></h5>
                                <p>Daftar Tempat Pemakaman Umum</p>
                                <a href="{{ route('publics.cemetery.index') }}" class="btn2 mt-20">Buka Layanan <i
                                        class="fas fa-chevron-right"></i></a>
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
