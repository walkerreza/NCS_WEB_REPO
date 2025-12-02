<?php
/**
 * 404 Not Found Page
 * Beautiful error page with pastel theme
 */
?>

<!-- 404 Section -->
<section class="relative min-h-[calc(100vh-120px)] flex items-center justify-center overflow-hidden py-20">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#171c28] via-[#1e2433] to-[#242b3d]">
        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="error-grid" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 60 0 L 0 0 0 60" fill="none" stroke="rgba(136, 201, 201, 0.2)" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#error-grid)" />
            </svg>
        </div>
        
        <!-- Floating Orbs -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute w-96 h-96 -top-48 -left-48 bg-[#e8b4bc]/10 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute w-96 h-96 -bottom-48 -right-48 bg-[#c3b1e1]/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
            <div class="absolute w-64 h-64 top-1/4 right-1/4 bg-[#88c9c9]/5 rounded-full blur-3xl animate-float"></div>
        </div>
    </div>
    
    <!-- Content -->
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Glitch 404 Number -->
            <div class="relative mb-8" data-aos="zoom-in">
                <h1 class="text-[150px] sm:text-[200px] font-display font-bold leading-none select-none relative">
                    <span class="absolute inset-0 text-[#e8b4bc]/20 animate-pulse" style="animation-duration: 3s;">404</span>
                    <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-[#e8b4bc] via-[#c3b1e1] to-[#88c9c9]">404</span>
                </h1>
                
                <!-- Decorative Lines -->
                <div class="absolute left-1/2 -translate-x-1/2 -bottom-4 w-32 h-1 bg-gradient-to-r from-transparent via-[#88c9c9] to-transparent"></div>
            </div>
            
            <!-- Error Icon -->
            <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#e8b4bc]/20 to-[#c3b1e1]/20 rounded-2xl border border-[#e8b4bc]/30">
                    <i class="fas fa-exclamation-triangle text-[#e8b4bc] text-3xl"></i>
                </div>
            </div>
            
            <!-- Error Message -->
            <h2 class="font-display text-2xl sm:text-3xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="200">
                Halaman Tidak Ditemukan
            </h2>
            
            <p class="text-gray-400 text-lg mb-8 max-w-md mx-auto" data-aos="fade-up" data-aos-delay="300">
                Maaf, halaman yang Anda cari tidak tersedia atau mungkin telah dipindahkan.
            </p>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4" data-aos="fade-up" data-aos-delay="400">
                <a href="<?= baseUrl() ?>" class="cyber-btn px-8 py-4 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 font-semibold rounded-xl hover:opacity-90 transition-all shadow-lg shadow-[#88c9c9]/20">
                    <i class="fas fa-home mr-2"></i>Kembali ke Beranda
                </a>
                <a href="javascript:history.back()" class="cyber-btn px-8 py-4 bg-transparent border-2 border-[#c3b1e1]/50 text-[#c3b1e1] font-semibold rounded-xl hover:bg-[#c3b1e1]/10 transition-all">
                    <i class="fas fa-arrow-left mr-2"></i>Halaman Sebelumnya
                </a>
            </div>
            
            <!-- Quick Links -->
            <div class="mt-12 pt-8 border-t border-gray-700/50" data-aos="fade-up" data-aos-delay="500">
                <p class="text-gray-500 text-sm mb-4">Atau kunjungi halaman lain:</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?= baseUrl('?page=visi-misi') ?>" class="text-[#88c9c9] hover:text-[#a8e6cf] text-sm transition-colors">
                        <i class="fas fa-bullseye mr-1"></i>Visi & Misi
                    </a>
                    <span class="text-gray-600">•</span>
                    <a href="<?= baseUrl('?page=agenda') ?>" class="text-[#88c9c9] hover:text-[#a8e6cf] text-sm transition-colors">
                        <i class="fas fa-calendar-alt mr-1"></i>Agenda
                    </a>
                    <span class="text-gray-600">•</span>
                    <a href="<?= baseUrl('?page=galeri') ?>" class="text-[#88c9c9] hover:text-[#a8e6cf] text-sm transition-colors">
                        <i class="fas fa-images mr-1"></i>Galeri
                    </a>
                    <span class="text-gray-600">•</span>
                    <a href="<?= baseUrl('?page=penelitian') ?>" class="text-[#88c9c9] hover:text-[#a8e6cf] text-sm transition-colors">
                        <i class="fas fa-file-alt mr-1"></i>Penelitian
                    </a>
                </div>
            </div>
            
            <!-- Terminal Style Error Info -->
            <div class="mt-12 text-left max-w-md mx-auto" data-aos="fade-up" data-aos-delay="600">
                <div class="cyber-card rounded-xl overflow-hidden">
                    <div class="bg-gray-800/50 px-4 py-2 flex items-center gap-2 border-b border-gray-700">
                        <span class="w-3 h-3 rounded-full bg-[#e8b4bc]"></span>
                        <span class="w-3 h-3 rounded-full bg-[#f5c7a9]"></span>
                        <span class="w-3 h-3 rounded-full bg-[#a8e6cf]"></span>
                        <span class="text-gray-500 text-xs ml-2 font-mono">error_log</span>
                    </div>
                    <div class="p-4 font-mono text-sm">
                        <p class="text-gray-500">$ cat /var/log/ncs/error.log</p>
                        <p class="text-[#e8b4bc] mt-2">[ERROR] Page not found</p>
                        <p class="text-gray-400">URI: <span class="text-[#88c9c9]"><?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/unknown') ?></span></p>
                        <p class="text-gray-400">Time: <span class="text-[#c3b1e1]"><?= date('Y-m-d H:i:s') ?></span></p>
                        <p class="text-[#a8e6cf] mt-2 animate-pulse">█</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Floating Security Icons -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <i class="fas fa-shield-alt absolute text-[#88c9c9]/5 text-6xl top-1/4 left-10 animate-float" style="animation-delay: 0s;"></i>
        <i class="fas fa-lock absolute text-[#c3b1e1]/5 text-5xl top-1/3 right-20 animate-float" style="animation-delay: 1s;"></i>
        <i class="fas fa-key absolute text-[#a7c5eb]/5 text-4xl bottom-1/4 left-1/4 animate-float" style="animation-delay: 2s;"></i>
        <i class="fas fa-fingerprint absolute text-[#e8b4bc]/5 text-7xl bottom-1/3 right-1/4 animate-float" style="animation-delay: 1.5s;"></i>
    </div>
</section>


