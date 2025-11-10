@extends('layouts.frontend')

@section('title', 'Arsip Pengabdian')
@section('meta_description', 'Arsip Pengabdian Masyarakat Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item">Arsip</li>
                <li class="breadcrumb-item active" aria-current="page">Pengabdian</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Arsip Pengabdian Section -->
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8" data-aos="fade-right">
                <h1 class="display-6 fw-bold mb-2">Arsip Pengabdian Masyarakat</h1>
                <p class="text-muted">Dokumentasi kegiatan pengabdian kepada masyarakat</p>
            </div>
            <div class="col-md-4" data-aos="fade-left">
                <!-- Filter/Search -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari dokumen..." id="searchArchive">
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Archive List -->
        <div class="row g-3">
            {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
            @for($i = 1; $i <= 8; $i++)
            <div class="col-12 archive-card" 
                 data-title="Pelatihan Keamanan Jaringan untuk UMKM {{ $i }}" 
                 data-author="Tim Pengabdian {{ $i }}" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $i * 30 }}">
                <div class="card border-0 shadow-sm hover-lift">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-2 text-center mb-3 mb-lg-0">
                                <div class="file-icon">
                                    <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 3.5rem;"></i>
                                </div>
                                <small class="text-muted d-block mt-2">PDF</small>
                            </div>
                            <div class="col-lg-8 mb-3 mb-lg-0">
                                <h5 class="fw-bold mb-2">Pelatihan Keamanan Jaringan dan Website untuk UMKM Kota Malang {{ $i }}</h5>
                                <div class="d-flex flex-wrap gap-3 text-muted small mb-2">
                                    <span><i class="bi bi-people me-1"></i>Tim Pengabdian Lab NCS</span>
                                    <span><i class="bi bi-calendar3 me-1"></i>{{ date('Y', strtotime('-' . $i*3 . ' months')) }}</span>
                                    <span><i class="bi bi-tag me-1"></i>Pelatihan</span>
                                </div>
                                <p class="text-muted small mb-2">
                                    Kegiatan pengabdian masyarakat berupa pelatihan tentang keamanan jaringan 
                                    dan website untuk pelaku UMKM di Kota Malang. Materi meliputi dasar-dasar 
                                    keamanan web, SSL/TLS, dan proteksi dari cyber attack.
                                </p>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-success">Selesai</span>
                                    <span class="badge bg-info">{{ rand(20, 50) }} Peserta</span>
                                </div>
                            </div>
                            <div class="col-lg-2 text-lg-end">
                                <div class="d-flex flex-column gap-2">
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="bi bi-download me-1"></i>Download
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i>Detail
                                    </a>
                                </div>
                                <small class="text-muted d-block mt-2">
                                    <i class="bi bi-download me-1"></i>{{ rand(30, 300) }} unduhan
                                </small>
                            </div>
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
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection
