@extends('layouts.frontend')

@section('title', 'Layanan Konsultatif')
@section('meta_description', 'Layanan konsultasi keamanan siber Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item">Layanan</li>
                <li class="breadcrumb-item active" aria-current="page">Konsultatif</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-6 fw-bold mb-4">Layanan Konsultatif</h1>
                <p class="lead mb-4">
                    Dapatkan solusi keamanan siber terbaik dari tim ahli kami untuk 
                    melindungi aset digital Anda.
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="bg-white rounded shadow d-flex align-items-center justify-content-center p-5" style="min-height: 400px;">
                    <div class="text-center text-primary">
                        <i class="bi bi-headset" style="font-size: 6rem;"></i>
                        <h4 class="mt-3">Layanan Konsultatif</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-6 fw-bold mb-3">Layanan Kami</h2>
            <p class="text-muted">Berbagai layanan konsultasi untuk kebutuhan keamanan Anda</p>
        </div>
        
        <div class="row g-4">
            <!-- Layanan 1 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="icon-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px; border-radius: 50%;">
                            <i class="bi bi-shield-check text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Security Assessment</h5>
                        <p class="text-muted mb-3">
                            Evaluasi menyeluruh terhadap sistem keamanan informasi organisasi Anda 
                            untuk mengidentifikasi kerentanan dan risiko.
                        </p>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Vulnerability Assessment</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Risk Analysis</li>
                            <li><i class="bi bi-check text-success me-2"></i>Compliance Check</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 2 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="icon-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px; border-radius: 50%;">
                            <i class="bi bi-bug text-danger" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Penetration Testing</h5>
                        <p class="text-muted mb-3">
                            Simulasi serangan siber untuk menguji keamanan sistem dan menemukan 
                            celah keamanan sebelum dieksploitasi oleh peretas.
                        </p>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Web Application Pentest</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Network Pentest</li>
                            <li><i class="bi bi-check text-success me-2"></i>Mobile App Pentest</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 3 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="icon-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px; border-radius: 50%;">
                            <i class="bi bi-mortarboard text-success" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Security Training</h5>
                        <p class="text-muted mb-3">
                            Pelatihan keamanan siber untuk meningkatkan awareness dan skill 
                            tim IT organisasi Anda.
                        </p>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Security Awareness</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Technical Training</li>
                            <li><i class="bi bi-check text-success me-2"></i>Incident Response</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 4 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="icon-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px; border-radius: 50%;">
                            <i class="bi bi-diagram-3 text-warning" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Network Security</h5>
                        <p class="text-muted mb-3">
                            Konsultasi dan implementasi solusi keamanan jaringan untuk 
                            melindungi infrastruktur IT organisasi.
                        </p>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Firewall Configuration</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>VPN Setup</li>
                            <li><i class="bi bi-check text-success me-2"></i>Network Monitoring</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 5 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="icon-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px; border-radius: 50%;">
                            <i class="bi bi-file-earmark-lock text-info" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Incident Response</h5>
                        <p class="text-muted mb-3">
                            Bantuan cepat dalam menangani insiden keamanan siber dan 
                            pemulihan sistem yang terkena serangan.
                        </p>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>24/7 Emergency Response</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Forensik Digital</li>
                            <li><i class="bi bi-check text-success me-2"></i>Recovery Support</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 6 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="icon-circle bg-secondary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 70px; height: 70px; border-radius: 50%;">
                            <i class="bi bi-clipboard-check text-secondary" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Compliance Advisory</h5>
                        <p class="text-muted mb-3">
                            Konsultasi untuk memastikan sistem organisasi memenuhi 
                            standar dan regulasi keamanan yang berlaku.
                        </p>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>ISO 27001</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>GDPR/PDP</li>
                            <li><i class="bi bi-check text-success me-2"></i>NIST Framework</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="zoom-in">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="fw-bold text-center mb-4">Hubungi Kami</h3>
                        <p class="text-center text-muted mb-4">
                            Isi formulir di bawah ini untuk berkonsultasi dengan tim kami
                        </p>
                        
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" required>
                                    <div class="invalid-feedback">Mohon isi nama lengkap Anda.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" required>
                                    <div class="invalid-feedback">Mohon isi email yang valid.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label fw-semibold">No. Telepon <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="telepon" required>
                                    <div class="invalid-feedback">Mohon isi nomor telepon.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="organisasi" class="form-label fw-semibold">Organisasi/Perusahaan</label>
                                    <input type="text" class="form-control" id="organisasi">
                                </div>
                                <div class="col-12">
                                    <label for="layanan" class="form-label fw-semibold">Layanan yang Diminati <span class="text-danger">*</span></label>
                                    <select class="form-select" id="layanan" required>
                                        <option value="" selected disabled>Pilih layanan...</option>
                                        <option value="security-assessment">Security Assessment</option>
                                        <option value="penetration-testing">Penetration Testing</option>
                                        <option value="security-training">Security Training</option>
                                        <option value="network-security">Network Security</option>
                                        <option value="incident-response">Incident Response</option>
                                        <option value="compliance-advisory">Compliance Advisory</option>
                                    </select>
                                    <div class="invalid-feedback">Mohon pilih layanan yang diminati.</div>
                                </div>
                                <div class="col-12">
                                    <label for="pesan" class="form-label fw-semibold">Pesan/Kebutuhan <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="pesan" rows="5" required></textarea>
                                    <div class="invalid-feedback">Mohon isi pesan atau kebutuhan Anda.</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agreement" required>
                                        <label class="form-check-label small text-muted" for="agreement">
                                            Saya setuju dengan kebijakan privasi dan penggunaan data
                                        </label>
                                        <div class="invalid-feedback">Anda harus menyetujui untuk melanjutkan.</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="bi bi-send me-2"></i>Kirim Pesan
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="text-muted mb-2"><strong>Atau hubungi kami langsung:</strong></p>
                            <p class="mb-1">
                                <i class="bi bi-envelope me-2 text-primary"></i>
                                <a href="mailto:ncs@polinema.ac.id" class="text-decoration-none">ncs@polinema.ac.id</a>
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-telephone me-2 text-primary"></i>
                                <a href="tel:+6234140424" class="text-decoration-none">(0341) 404424</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
