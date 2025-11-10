@extends('layouts.frontend')

@section('title', 'Beranda')
@section('meta_description', 'Laboratorium Network & Cyber Security Polinema - Pusat penelitian dan pengembangan keamanan siber terdepan')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-gradient-primary py-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold text-white mb-4">
                        Laboratorium Network & <span class="text-warning">Cyber Security</span>
                    </h1>
                    <p class="lead text-white-50 mb-4">
                        Pusat penelitian dan pengembangan keamanan siber terdepan di Politeknik Negeri Malang. 
                        Berfokus pada inovasi teknologi keamanan jaringan dan sistem informasi.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('profil.visi-misi') }}" class="btn btn-warning btn-lg px-4 py-3 fw-bold">
                            <i class="bi bi-info-circle me-2"></i>Tentang Kami
                        </a>
                        <a href="{{ route('layanan.konsultatif') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                            <i class="bi bi-chat-dots me-2"></i>Konsultasi
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image mt-5 mt-lg-0">
                    <img src="{{ asset('images/hero-cyber-security.svg') }}" 
                         alt="Cyber Security Illustration" 
                         class="img-fluid"
                         onerror="this.style.display='none'">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-6 fw-bold mb-3">Fokus Penelitian Kami</h2>
            <p class="text-muted">Area keahlian dan layanan unggulan laboratorium</p>
        </div>
        
        <div class="row g-4">
            <!-- Card 1: Cyber Security -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-4">
                            <div class="icon-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; border-radius: 50%;">
                                <i class="bi bi-shield-lock text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="card-title fw-bold mb-3">Cyber Security</h5>
                        <p class="card-text text-muted">
                            Penelitian keamanan sistem informasi, penetration testing, 
                            vulnerability assessment, dan pengembangan defense mechanism.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Network Security -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-4">
                            <div class="icon-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; border-radius: 50%;">
                                <i class="bi bi-diagram-3 text-success" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="card-title fw-bold mb-3">Network Security</h5>
                        <p class="card-text text-muted">
                            Pengembangan infrastruktur jaringan yang aman, network monitoring, 
                            dan implementasi sistem keamanan jaringan enterprise.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 3: IoT Security -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-4">
                            <div class="icon-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; border-radius: 50%;">
                                <i class="bi bi-cpu text-danger" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="card-title fw-bold mb-3">IoT Security</h5>
                        <p class="card-text text-muted">
                            Keamanan perangkat Internet of Things, smart systems, 
                            dan pengembangan protokol keamanan untuk embedded systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Agenda Section -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-up">
            <div>
                <h2 class="display-6 fw-bold mb-2">Agenda Terbaru</h2>
                <p class="text-muted">Kegiatan dan acara laboratorium</p>
            </div>
            <a href="{{ route('galeri') }}" class="btn btn-outline-primary">
                Lihat Semua <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="row g-4">
            {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
            @for($i = 1; $i <= 3; $i++)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="card border-0 shadow-sm hover-lift h-100">
                    <div class="card-img-top bg-gradient-primary d-flex align-items-center justify-content-center text-white" style="height: 200px;">
                        <i class="bi bi-calendar-event" style="font-size: 4rem; opacity: 0.3;"></i>
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
                        <div class="d-flex align-items-center text-muted small mt-3">
                            <i class="bi bi-geo-alt me-1"></i>
                            <span>Lab NCS - Polinema</span>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Statistics Counter Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3" data-aos="fade-up">
                <div class="counter-box">
                    <h2 class="display-4 fw-bold counter mb-2" data-target="50">0</h2>
                    <p class="mb-0 text-white-50">Penelitian</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="counter-box">
                    <h2 class="display-4 fw-bold counter mb-2" data-target="30">0</h2>
                    <p class="mb-0 text-white-50">Pengabdian</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="counter-box">
                    <h2 class="display-4 fw-bold counter mb-2" data-target="150">0</h2>
                    <p class="mb-0 text-white-50">Dokumentasi</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="counter-box">
                    <h2 class="display-4 fw-bold counter mb-2" data-target="500">0</h2>
                    <p class="mb-0 text-white-50">Total Unduhan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="zoom-in">
                <div class="cta-box p-5 bg-white rounded shadow-sm">
                    <h3 class="fw-bold mb-3">Tertarik Berkolaborasi?</h3>
                    <p class="text-muted mb-4">
                        Hubungi kami untuk konsultasi, kerjasama penelitian, atau layanan keamanan siber
                    </p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ route('layanan.konsultatif') }}" class="btn btn-primary btn-lg px-4">
                            <i class="bi bi-envelope me-2"></i>Hubungi Kami
                        </a>
                        <a href="{{ route('layanan.sarana') }}" class="btn btn-outline-primary btn-lg px-4">
                            <i class="bi bi-gear me-2"></i>Lihat Layanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    let hasAnimated = false;
    
    const animateCounters = () => {
        if (hasAnimated) return;
        
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const duration = 2000; // 2 detik
            const increment = target / (duration / 16); // 60 FPS
            let current = 0;
            
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            updateCounter();
        });
        
        hasAnimated = true;
    };
    
    // Animasi dimulai ketika section counter terlihat
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
            }
        });
    }, { threshold: 0.5 });
    
    const counterSection = document.querySelector('.bg-primary');
    if (counterSection) {
        observer.observe(counterSection);
    }
});
</script>
@endpush
