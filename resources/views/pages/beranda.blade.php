@extends('layouts.frontend')

@section('title', 'Beranda')
@section('meta_description', 'Laboratorium Network & Cyber Security Polinema - Pusat penelitian dan pengembangan keamanan siber terdepan')

@section('content')
<!-- Hero Section with Carousel -->
<section class="relative overflow-hidden" style="min-height: 100vh;">
    <!-- Carousel Container -->
    <div id="heroCarousel" class="relative h-screen">
        <!-- Slide 1 -->
        <div class="carousel-slide active absolute inset-0">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/gedung-jti.jpg') }}" 
                     alt="Gedung JTI Polinema" 
                     class="w-full h-full object-cover"
                     loading="eager">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-700/70 to-blue-400/70 dark:from-slate-900/80 dark:to-slate-800/80"></div>
            </div>
            
            <div class="container mx-auto px-4 relative z-10 h-full flex items-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center w-full">
                    <div data-aos="fade-right">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 drop-shadow-lg">
                            Laboratorium Network & <span class="text-[#FCD34D]">Cyber Security</span>
                        </h1>
                        <p class="text-lg md:text-xl text-white/95 mb-6 drop-shadow">
                            Pusat penelitian dan pengembangan keamanan siber terdepan di Politeknik Negeri Malang.
                        </p>
                        <div class="flex gap-4 flex-wrap">
                            <a href="{{ route('profil.visi-misi') }}" class="btn btn-warning inline-flex items-center text-lg px-6 py-4 font-bold rounded-lg shadow-lg hover:shadow-xl transition-all">
                                <i class="bi bi-info-circle mr-2"></i>Tentang Kami
                            </a>
                            <a href="{{ route('layanan.konsultatif') }}" class="btn-outline-light inline-flex items-center text-lg px-6 py-4 font-bold border-2 border-white text-white rounded-lg hover:bg-white hover:text-blue-700 transition-all duration-300 shadow-lg">
                                <i class="bi bi-chat-dots mr-2"></i>Konsultasi
                            </a>
                        </div>
                    </div>
                    <div data-aos="fade-left">
                        <img src="{{ asset('images/hero-cyber-security.svg') }}" 
                             alt="Cyber Security" 
                             class="w-full h-auto drop-shadow-2xl"
                             loading="lazy"
                             onerror="this.style.display='none'">
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-slide absolute inset-0">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/gedung-jti.jpg') }}" 
                     alt="Network Security" 
                     class="w-full h-full object-cover"
                     loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-br from-green-700/70 to-green-500/70 dark:from-green-900/80 dark:to-green-800/80"></div>
            </div>
            
            <div class="container mx-auto px-4 relative z-10 h-full flex items-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center w-full">
                    <div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 drop-shadow-lg">
                            Keamanan Jaringan <span class="text-[#FCD34D]">Enterprise</span>
                        </h1>
                        <p class="text-lg md:text-xl text-white/95 mb-6 drop-shadow">
                            Implementasi dan pengembangan sistem keamanan jaringan untuk skala enterprise.
                        </p>
                        <div class="flex gap-4 flex-wrap">
                            <a href="{{ route('layanan.sarana') }}" class="btn btn-warning inline-flex items-center text-lg px-6 py-4 font-bold rounded-lg shadow-lg hover:shadow-xl transition-all">
                                <i class="bi bi-gear mr-2"></i>Lihat Layanan
                            </a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('images/hero-cyber-security.svg') }}" 
                             alt="Network Security" 
                             class="w-full h-auto drop-shadow-2xl"
                             loading="lazy"
                             onerror="this.style.display='none'">
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-slide absolute inset-0">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/gedung-jti.jpg') }}" 
                     alt="Research & Innovation" 
                     class="w-full h-full object-cover"
                     loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-700/70 to-purple-500/70 dark:from-purple-900/80 dark:to-purple-800/80"></div>
            </div>
            
            <div class="container mx-auto px-4 relative z-10 h-full flex items-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center w-full">
                    <div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 drop-shadow-lg">
                            Penelitian & <span class="text-[#FCD34D]">Inovasi</span>
                        </h1>
                        <p class="text-lg md:text-xl text-white/95 mb-6 drop-shadow">
                            Mendorong inovasi teknologi keamanan siber melalui penelitian berkualitas tinggi.
                        </p>
                        <div class="flex gap-4 flex-wrap">
                            <a href="{{ route('arsip.penelitian') }}" class="btn btn-warning inline-flex items-center text-lg px-6 py-4 font-bold rounded-lg shadow-lg hover:shadow-xl transition-all">
                                <i class="bi bi-journal-text mr-2"></i>Lihat Penelitian
                            </a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('images/hero-cyber-security.svg') }}" 
                             alt="Research" 
                             class="w-full h-auto drop-shadow-2xl"
                             loading="lazy"
                             onerror="this.style.display='none'">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel Navigation Arrows -->
    <button id="prevSlide" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-4 rounded-full transition-all duration-300 group">
        <i class="bi bi-chevron-left text-2xl group-hover:scale-110 transition-transform"></i>
    </button>
    <button id="nextSlide" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-4 rounded-full transition-all duration-300 group">
        <i class="bi bi-chevron-right text-2xl group-hover:scale-110 transition-transform"></i>
    </button>

    <!-- Carousel Indicators -->
    <div class="absolute bottom-24 left-1/2 -translate-x-1/2 z-20 flex gap-3">
        <button class="carousel-indicator active w-3 h-3 rounded-full bg-white transition-all duration-300" data-slide="0"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 transition-all duration-300" data-slide="1"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 transition-all duration-300" data-slide="2"></button>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center animate-bounce">
        <span class="text-white text-sm mb-2 font-medium drop-shadow">Scroll ke bawah</span>
        <button id="scrollDownBtn" class="text-white hover:text-[#FCD34D] transition-colors">
            <i class="bi bi-chevron-down text-3xl"></i>
        </button>
    </div>
</section>

<!-- Featured Services Section -->
<section class="py-12 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Fokus Penelitian Kami</h2>
            <p class="text-gray-600 dark:text-gray-400">Area keahlian dan layanan unggulan laboratorium</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Cyber Security -->
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="card h-full border-0 shadow-sm hover-lift bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-8 text-center">
                        <div class="mb-6">
                            <div class="icon-circle bg-blue-100 dark:bg-blue-500/10 inline-flex items-center justify-center" 
                                 style="width: 80px; height: 80px; border-radius: 50%;">
                                <i class="bi bi-shield-lock text-blue-600 dark:text-blue-400" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="text-xl font-bold mb-4">Cyber Security</h5>
                        <p class="text-gray-600 dark:text-gray-400">
                            Penelitian keamanan sistem informasi, penetration testing, 
                            vulnerability assessment, dan pengembangan defense mechanism.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Network Security -->
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="card h-full border-0 shadow-sm hover-lift bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-8 text-center">
                        <div class="mb-6">
                            <div class="icon-circle bg-green-100 dark:bg-green-500/10 inline-flex items-center justify-center" 
                                 style="width: 80px; height: 80px; border-radius: 50%;">
                                <i class="bi bi-diagram-3 text-green-600 dark:text-green-400" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="text-xl font-bold mb-4">Network Security</h5>
                        <p class="text-gray-600 dark:text-gray-400">
                            Pengembangan infrastruktur jaringan yang aman, network monitoring, 
                            dan implementasi sistem keamanan jaringan enterprise.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 3: IoT Security -->
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="card h-full border-0 shadow-sm hover-lift bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-8 text-center">
                        <div class="mb-6">
                            <div class="icon-circle bg-red-100 dark:bg-red-500/10 inline-flex items-center justify-center" 
                                 style="width: 80px; height: 80px; border-radius: 50%;">
                                <i class="bi bi-cpu text-red-600 dark:text-red-400" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="text-xl font-bold mb-4">IoT Security</h5>
                        <p class="text-gray-600 dark:text-gray-400">
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
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12" data-aos="fade-up">
            <div class="mb-4 md:mb-0">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2">Agenda Terbaru</h2>
                <p class="text-gray-600 dark:text-gray-400">Kegiatan dan acara laboratorium</p>
            </div>
            <a href="{{ route('galeri') }}" class="btn-outline-light border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-6 py-2 rounded-lg inline-flex items-center transition-all duration-300">
                Lihat Semua <i class="bi bi-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
            @for($i = 1; $i <= 3; $i++)
            <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl overflow-hidden">
                    <div class="bg-gradient-to-br from-[#1E40AF] to-blue-500 flex items-center justify-center text-white" style="height: 200px;">
                        <i class="bi bi-calendar-event" style="font-size: 4rem; opacity: 0.3;"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <i class="bi bi-calendar-event text-blue-600 mr-2"></i>
                            <small class="text-gray-600 dark:text-gray-400">{{ date('d M Y', strtotime('+' . $i . ' days')) }}</small>
                            <span class="ml-auto bg-blue-600 text-white px-3 py-1 rounded-full text-sm">Upcoming</span>
                        </div>
                        <h5 class="text-xl font-bold mb-3">Workshop Cyber Security #{{ $i }}</h5>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Pelatihan dan workshop tentang teknik-teknik keamanan siber modern 
                            untuk mahasiswa dan praktisi IT.
                        </p>
                        <div class="flex items-center text-gray-600 dark:text-gray-400 text-sm mt-4">
                            <i class="bi bi-geo-alt mr-1"></i>
                            <span>Lab NCS - Polinema</span>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Statistics Counter Section with Building Background -->
<section class="relative py-12 text-white overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/gedung-jti.jpg') }}" 
             alt="Gedung JTI Polinema" 
             class="w-full h-full object-cover"
             loading="lazy">
        <div class="absolute inset-0 bg-blue-700/85 dark:bg-blue-900/90"></div>
    </div>
    
    <!-- Content -->
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div data-aos="fade-up">
                <div class="counter-box backdrop-blur-sm bg-white/10 rounded-xl p-6 hover:bg-white/20 transition-all duration-300">
                    <h2 class="text-5xl md:text-6xl font-bold counter mb-2 drop-shadow-lg" data-target="50">0</h2>
                    <p class="mb-0 text-white/90 font-semibold">Penelitian</p>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="counter-box backdrop-blur-sm bg-white/10 rounded-xl p-6 hover:bg-white/20 transition-all duration-300">
                    <h2 class="text-5xl md:text-6xl font-bold counter mb-2 drop-shadow-lg" data-target="30">0</h2>
                    <p class="mb-0 text-white/90 font-semibold">Pengabdian</p>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="counter-box backdrop-blur-sm bg-white/10 rounded-xl p-6 hover:bg-white/20 transition-all duration-300">
                    <h2 class="text-5xl md:text-6xl font-bold counter mb-2 drop-shadow-lg" data-target="150">0</h2>
                    <p class="mb-0 text-white/90 font-semibold">Dokumentasi</p>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="counter-box backdrop-blur-sm bg-white/10 rounded-xl p-6 hover:bg-white/20 transition-all duration-300">
                    <h2 class="text-5xl md:text-6xl font-bold counter mb-2 drop-shadow-lg" data-target="500">0</h2>
                    <p class="mb-0 text-white/90 font-semibold">Total Unduhan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3 text-center" data-aos="zoom-in">
                <div class="bg-white dark:bg-slate-700 rounded-xl shadow-sm p-12">
                    <h3 class="text-2xl md:text-3xl font-bold mb-4">Tertarik Berkolaborasi?</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Hubungi kami untuk konsultasi, kerjasama penelitian, atau layanan keamanan siber
                    </p>
                    <div class="flex gap-4 justify-center flex-wrap">
                        <a href="{{ route('layanan.konsultatif') }}" class="btn-primary inline-flex items-center text-lg px-6 py-3 rounded-lg">
                            <i class="bi bi-envelope mr-2"></i>Hubungi Kami
                        </a>
                        <a href="{{ route('layanan.sarana') }}" class="btn-outline-light border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white inline-flex items-center text-lg px-6 py-3 rounded-lg transition-all duration-300">
                            <i class="bi bi-gear mr-2"></i>Lihat Layanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Carousel Styles */
    .carousel-slide {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.8s ease-in-out, visibility 0.8s ease-in-out;
    }
    
    .carousel-slide.active {
        opacity: 1;
        visibility: visible;
    }
    
    .carousel-indicator.active {
        background-color: white !important;
        width: 2rem;
    }
    
    /* Scroll Down Animation */
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0) translateX(-50%);
        }
        50% {
            transform: translateY(-10px) translateX(-50%);
        }
    }
</style>
@endpush

@push('scripts')
<script>
// Hero Carousel
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    const scrollDownBtn = document.getElementById('scrollDownBtn');
    let currentSlide = 0;
    let autoplayInterval;
    
    // Show slide function
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            indicators[i].classList.remove('active');
            indicators[i].classList.add('bg-white/50');
        });
        
        if (index >= slides.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = slides.length - 1;
        } else {
            currentSlide = index;
        }
        
        slides[currentSlide].classList.add('active');
        indicators[currentSlide].classList.add('active');
        indicators[currentSlide].classList.remove('bg-white/50');
    }
    
    // Next slide
    function nextSlide() {
        showSlide(currentSlide + 1);
    }
    
    // Previous slide
    function prevSlide() {
        showSlide(currentSlide - 1);
    }
    
    // Autoplay
    function startAutoplay() {
        autoplayInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }
    
    function stopAutoplay() {
        clearInterval(autoplayInterval);
    }
    
    // Event listeners
    prevBtn.addEventListener('click', () => {
        prevSlide();
        stopAutoplay();
        startAutoplay();
    });
    
    nextBtn.addEventListener('click', () => {
        nextSlide();
        stopAutoplay();
        startAutoplay();
    });
    
    // Indicator click
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showSlide(index);
            stopAutoplay();
            startAutoplay();
        });
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
            stopAutoplay();
            startAutoplay();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            stopAutoplay();
            startAutoplay();
        }
    });
    
    // Touch/Swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    
    const carousel = document.getElementById('heroCarousel');
    
    carousel.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });
    
    carousel.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });
    
    function handleSwipe() {
        if (touchEndX < touchStartX - 50) {
            nextSlide();
            stopAutoplay();
            startAutoplay();
        }
        if (touchEndX > touchStartX + 50) {
            prevSlide();
            stopAutoplay();
            startAutoplay();
        }
    }
    
    // Scroll down button
    scrollDownBtn.addEventListener('click', () => {
        const nextSection = document.querySelector('section:nth-of-type(2)');
        if (nextSection) {
            nextSection.scrollIntoView({ behavior: 'smooth' });
        }
    });
    
    // Start autoplay
    startAutoplay();
    
    // Pause autoplay when tab is not visible
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            stopAutoplay();
        } else {
            startAutoplay();
        }
    });
});

// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    let hasAnimated = false;
    
    const animateCounters = () => {
        if (hasAnimated) return;
        
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const duration = 2000;
            const increment = target / (duration / 16);
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
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
            }
        });
    }, { threshold: 0.5 });
    
    const counterSection = document.querySelectorAll('.counter-box')[0];
    if (counterSection) {
        observer.observe(counterSection.parentElement);
    }
});
</script>
@endpush
