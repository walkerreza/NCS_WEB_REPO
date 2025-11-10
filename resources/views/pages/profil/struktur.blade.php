@extends('layouts.frontend')

@section('title', 'Struktur Organisasi')
@section('meta_description', 'Struktur Organisasi Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item">Profil</li>
                <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Struktur Organisasi Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-5 fw-bold mb-3">Struktur Organisasi</h1>
            <p class="text-muted">Tim pengelola Lab Network & Cyber Security</p>
        </div>
        
        <!-- Diagram Struktur Organisasi -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10" data-aos="zoom-in">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <img src="{{ asset('images/struktur-organisasi.png') }}" 
                             alt="Struktur Organisasi" 
                             class="img-fluid rounded"
                             onerror="this.parentElement.innerHTML='<div class=\'text-center text-muted py-5\'><i class=\'bi bi-diagram-3 mb-3\' style=\'font-size: 4rem;\'></i><p>Diagram struktur organisasi belum tersedia</p><p class=\'small\'>Upload file struktur-organisasi.png ke folder public/images/</p></div>'">
                        <div class="text-center mt-3">
                            <a href="{{ asset('images/struktur-organisasi.png') }}" 
                               download 
                               class="btn btn-primary">
                                <i class="bi bi-download me-2"></i>Download Struktur
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Team Members Cards -->
        <div class="row g-4 mt-4">
            <div class="col-12" data-aos="fade-up">
                <h3 class="fw-bold text-center mb-4">Tim Pengelola</h3>
            </div>
            
            <!-- Kepala Laboratorium -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card text-center border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="rounded-circle bg-gradient-primary text-white d-flex align-items-center justify-content-center mx-auto" 
                                 style="width: 120px; height: 120px; font-size: 3rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">Dr. Nama Dosen, M.T.</h5>
                        <p class="text-primary small fw-semibold mb-2">Kepala Laboratorium</p>
                        <p class="text-muted small">NIP: 123456789</p>
                        <div class="mt-3">
                            <a href="#" class="text-muted me-2"><i class="bi bi-envelope"></i></a>
                            <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Koordinator Penelitian -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card text-center border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="rounded-circle bg-gradient-secondary text-white d-flex align-items-center justify-content-center mx-auto" 
                                 style="width: 120px; height: 120px; font-size: 3rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">Nama Dosen, S.T., M.T.</h5>
                        <p class="text-success small fw-semibold mb-2">Koordinator Penelitian</p>
                        <p class="text-muted small">NIP: 123456789</p>
                        <div class="mt-3">
                            <a href="#" class="text-muted me-2"><i class="bi bi-envelope"></i></a>
                            <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Koordinator Pengabdian -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card text-center border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="rounded-circle bg-gradient-accent text-white d-flex align-items-center justify-content-center mx-auto" 
                                 style="width: 120px; height: 120px; font-size: 3rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">Nama Dosen, S.Kom., M.Kom.</h5>
                        <p class="text-warning small fw-semibold mb-2">Koordinator Pengabdian</p>
                        <p class="text-muted small">NIP: 123456789</p>
                        <div class="mt-3">
                            <a href="#" class="text-muted me-2"><i class="bi bi-envelope"></i></a>
                            <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Laboran -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="card text-center border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center mx-auto" 
                                 style="width: 120px; height: 120px; font-size: 3rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-1">Nama Laboran, A.Md.</h5>
                        <p class="text-danger small fw-semibold mb-2">Laboran</p>
                        <p class="text-muted small">NIP: 123456789</p>
                        <div class="mt-3">
                            <a href="#" class="text-muted me-2"><i class="bi bi-envelope"></i></a>
                            <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
