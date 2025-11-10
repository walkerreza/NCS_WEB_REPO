@extends('layouts.frontend')

@section('title', 'Logo Laboratorium')
@section('meta_description', 'Logo dan Identitas Visual Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item">Profil</li>
                <li class="breadcrumb-item active" aria-current="page">Logo</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Logo Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-5 fw-bold mb-3">Logo Laboratorium</h1>
            <p class="text-muted">Identitas visual Lab Network & Cyber Security</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm" data-aos="zoom-in">
                    <div class="card-body p-5 text-center">
                        <!-- Logo Display -->
                        <div class="mb-5 p-5 bg-white rounded">
                            <img src="{{ asset('images/logo-ncs.png') }}" 
                                 alt="Logo Lab NCS" 
                                 class="img-fluid" 
                                 style="max-height: 300px;"
                                 onerror="this.parentElement.innerHTML='<div class=\'bg-primary text-white rounded p-4\'><i class=\'bi bi-image\' style=\'font-size: 4rem;\'></i><p class=\'mt-2\'>Logo belum tersedia</p></div>'">
                        </div>
                        
                        <!-- Logo Description -->
                        <h4 class="fw-bold mb-3">Lab Network & Cyber Security</h4>
                        <p class="text-muted mb-4">
                            Logo laboratorium mencerminkan komitmen kami dalam menjaga keamanan 
                            jaringan dan informasi. Desain yang modern dan profesional merepresentasikan 
                            inovasi dan dedikasi dalam bidang cyber security.
                        </p>
                        
                        <!-- Download Buttons -->
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="{{ asset('images/logo-ncs.png') }}" 
                               download="logo-ncs.png" 
                               class="btn btn-primary">
                                <i class="bi bi-download me-2"></i>Download PNG
                            </a>
                            <a href="{{ asset('images/logo-ncs.svg') }}" 
                               download="logo-ncs.svg" 
                               class="btn btn-outline-primary">
                                <i class="bi bi-download me-2"></i>Download SVG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Logo Usage Guidelines -->
        <div class="row mt-5">
            <div class="col-12" data-aos="fade-up">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h4 class="fw-bold mb-4 text-center">Panduan Penggunaan Logo</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-success me-3 mt-1" style="font-size: 1.5rem;"></i>
                                    <div>
                                        <h6 class="fw-bold">Ukuran Minimum</h6>
                                        <p class="text-muted small mb-0">Logo tidak boleh diperkecil kurang dari 50px tinggi untuk menjaga keterbacaan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-success me-3 mt-1" style="font-size: 1.5rem;"></i>
                                    <div>
                                        <h6 class="fw-bold">Ruang Kosong</h6>
                                        <p class="text-muted small mb-0">Berikan ruang kosong minimal 20px di sekitar logo</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-x-circle-fill text-danger me-3 mt-1" style="font-size: 1.5rem;"></i>
                                    <div>
                                        <h6 class="fw-bold">Jangan Ubah Warna</h6>
                                        <p class="text-muted small mb-0">Gunakan warna original logo, jangan mengubah skema warna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-x-circle-fill text-danger me-3 mt-1" style="font-size: 1.5rem;"></i>
                                    <div>
                                        <h6 class="fw-bold">Jangan Distorsi</h6>
                                        <p class="text-muted small mb-0">Jaga proporsi logo, jangan meregangkan atau menekan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
