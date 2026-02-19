@extends('layouts.barberApp')
@include('components.modalViewService')
@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#198754'
                });
            });
        </script>
    @endif
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>Nuestros servicios</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Services Area Start -->
        <section class="service-area section-padding30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-90">
                            <span>Servicios Profesionales</span>
                            <h2>Los mejores servicios que ofrecemos</h2>
                        </div>
                    </div>
                </div>
                <!-- Section caption -->
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                            <div class="services-caption text-center h-100">

                                <!-- Imagen -->
                                <div class="mb-3">
                                    @if ($service->img)
                                        <img src="{{ asset('storage/' . $service->img) }}" class="img-fluid rounded w-100"
                                            style="height: 220px; object-fit: cover;" alt="{{ $service->name }}">
                                    @else
                                        <img src="{{ asset('assets/img/default-service.jpg') }}"
                                            class="img-fluid rounded w-100" style="height: 220px; object-fit: cover;"
                                            alt="Servicio">
                                    @endif
                                </div>

                                <!-- Contenido -->
                                <div class="service-cap px-2">
                                    <h4>
                                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                                            data-bs-target="#serviceModal{{ $service->id }}">
                                            {{ $service->name }}
                                        </a>
                                    </h4>

                                    <!-- Texto corto -->
                                    <p class="text-muted small">
                                        {{ Str::limit($service->description, 90) }}
                                    </p>

                                    <span class="fw-bold d-block">
                                        ${{ $service->price }} MXN · {{ $service->duration }} min
                                    </span>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- Services Area End -->
    </main>
    <x-footer-component />
@endsection
