@extends('layouts.public.app')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center"
        style="background-image:url('{{ asset('assets/public/img/testimonial/test-bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title mb-30">
                            <h2>Informasi TPU</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <div class="container mt-4">

        <div class="row pt-90 mb-90">
            @forelse($cemeteries as $cemetery)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cemetery->name }}</h5>
                            <p class="card-text"><strong>Alamat:</strong> {{ $cemetery->address }}</p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Belum ada data TPU.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
