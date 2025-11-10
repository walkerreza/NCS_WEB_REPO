@extends('layouts.frontend')

@section('title', 'Visi & Misi')
@section('meta_description', 'Visi dan Misi Laboratorium Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item">Profil</li>
                <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Visi Misi Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-5 fw-bold mb-3">Visi & Misi</h1>
            <p class="text-muted">Arah dan tujuan Lab Network & Cyber Security</p>
        </div>
        
        <div class="row g-4">
            <!-- Visi -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="bi bi-eye text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="mb-0 fw-bold">Visi</h3>
                        </div>
                        <p class="text-muted lead">
                            Menjadi laboratorium unggulan dalam penelitian dan pengembangan teknologi 
                            keamanan jaringan dan cyber security yang berkontribusi pada peningkatan 
                            keamanan informasi di tingkat nasional dan internasional.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Misi -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="bi bi-bullseye text-success" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="mb-0 fw-bold">Misi</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span class="text-muted">Melakukan penelitian inovatif di bidang keamanan jaringan dan cyber security</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span class="text-muted">Mengembangkan kompetensi mahasiswa dan dosen dalam teknologi keamanan informasi</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span class="text-muted">Memberikan layanan konsultasi dan pelatihan keamanan siber kepada masyarakat</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span class="text-muted">Menjalin kerjasama dengan industri dan institusi pendidikan dalam pengembangan teknologi</span>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span class="text-muted">Berkontribusi dalam peningkatan kesadaran keamanan siber di masyarakat</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Nilai-nilai Laboratorium -->
        <div class="row mt-5">
            <div class="col-12" data-aos="fade-up">
                <div class="card border-0 shadow-sm bg-light">
                    <div class="card-body p-5">
                        <h3 class="fw-bold text-center mb-4">Nilai-Nilai Laboratorium</h3>
                        <div class="row g-4 text-center">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <i class="bi bi-lightbulb text-warning" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="fw-bold">Inovasi</h5>
                                <p class="text-muted small">Selalu mengembangkan solusi baru dan kreatif</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <i class="bi bi-people text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="fw-bold">Kolaborasi</h5>
                                <p class="text-muted small">Bekerja sama untuk hasil terbaik</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <i class="bi bi-shield-check text-success" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="fw-bold">Integritas</h5>
                                <p class="text-muted small">Menjunjung tinggi etika dan profesionalisme</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <i class="bi bi-graph-up-arrow text-danger" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="fw-bold">Keunggulan</h5>
                                <p class="text-muted small">Mengejar standar kualitas tertinggi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
