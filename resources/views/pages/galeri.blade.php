@extends('layouts.frontend')

@section('title', 'Galeri & Agenda')
@section('meta_description', 'Galeri kegiatan dan agenda Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Galeri & Agenda Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-5 fw-bold mb-3">Galeri & Agenda</h1>
            <p class="text-muted">Dokumentasi kegiatan dan agenda laboratorium</p>
        </div>
        
        <!-- Tabs Navigation -->
        <ul class="nav nav-pills justify-content-center mb-5" id="galleryTabs" role="tablist" data-aos="fade-up">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-2 me-2" 
                        id="agenda-tab" 
                        data-bs-toggle="pill" 
                        data-bs-target="#agenda" 
                        type="button" 
                        role="tab" 
                        aria-controls="agenda" 
                        aria-selected="true">
                    <i class="bi bi-calendar-event me-2"></i>Agenda Mendatang
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2" 
                        id="kegiatan-tab" 
                        data-bs-toggle="pill" 
                        data-bs-target="#kegiatan" 
                        type="button" 
                        role="tab" 
                        aria-controls="kegiatan" 
                        aria-selected="false">
                    <i class="bi bi-images me-2"></i>Dokumentasi Kegiatan
                </button>
            </li>
        </ul>
        
        <div class="tab-content" id="galleryTabContent">
            <!-- Agenda Tab -->
            <div class="tab-pane fade show active" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                <div class="row g-4">
                    {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
                    @for($i = 1; $i <= 6; $i++)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="card border-0 shadow-sm hover-lift h-100">
                            <div class="card-img-top bg-gradient-{{ ['primary', 'secondary', 'accent', 'success', 'danger', 'warning'][$i-1] }} d-flex align-items-center justify-content-center text-white" style="height: 200px;">
                                <i class="bi bi-calendar-event" style="font-size: 3rem; opacity: 0.3;"></i>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar-event text-primary me-2"></i>
                                    <small class="text-muted">{{ date('d M Y', strtotime('+' . $i . ' days')) }}</small>
                                    <span class="badge bg-primary ms-auto">Upcoming</span>
                                </div>
                                <h5 class="card-title fw-bold">Workshop Cyber Security #{{ $i }}</h5>
                                <p class="card-text text-muted small">
                                    Pelatihan dan workshop tentang teknik-teknik keamanan siber modern 
                                    untuk mahasiswa dan praktisi IT.
                                </p>
                                <hr>
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    <span>Lab NCS - Polinema</span>
                                </div>
                                <div class="d-flex align-items-center text-muted small mt-2">
                                    <i class="bi bi-clock me-2"></i>
                                    <span>09:00 - 15:00 WIB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <!-- Kegiatan Tab -->
            <div class="tab-pane fade" id="kegiatan" role="tabpanel" aria-labelledby="kegiatan-tab">
                <div class="row g-4">
                    {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
                    @for($i = 1; $i <= 9; $i++)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="gallery-item d-block">
                            <div class="card border-0 shadow-sm overflow-hidden hover-lift">
                                <div class="position-relative bg-gradient-{{ ['primary', 'secondary', 'accent', 'success', 'danger', 'warning', 'primary', 'info', 'danger'][$i-1] }} d-flex align-items-center justify-content-center text-white" style="height: 250px;">
                                    <div class="text-center">
                                        <i class="bi bi-image" style="font-size: 3rem; opacity: 0.5;"></i>
                                        <p class="mt-2 mb-0">Foto Kegiatan {{ $i }}</p>
                                    </div>
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-dark bg-opacity-75">
                                            <i class="bi bi-zoom-in"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h6 class="fw-bold mb-2">Kegiatan Laboratorium #{{ $i }}</h6>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ date('d M Y', strtotime('-' . $i*7 . ' days')) }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
