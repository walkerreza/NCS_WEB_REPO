<?php
/**
 * Admin 404 Not Found Page
 */
?>

<div class="min-h-[60vh] flex items-center justify-center">
    <div class="text-center">
        <!-- 404 Number -->
        <h1 class="text-[120px] sm:text-[150px] font-bold leading-none mb-4">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-pink-400 to-purple-400">404</span>
        </h1>
        
        <!-- Error Icon -->
        <div class="mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-red-500/10 rounded-2xl border border-red-500/30">
                <i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i>
            </div>
        </div>
        
        <!-- Error Message -->
        <h2 class="text-xl sm:text-2xl font-bold text-white mb-3">
            Halaman Tidak Ditemukan
        </h2>
        
        <p class="text-gray-400 mb-8 max-w-md mx-auto">
            Maaf, halaman admin yang Anda cari tidak tersedia.
        </p>
        
        <!-- Action Button -->
        <a href="<?= baseUrl('admin/?p=dashboard') ?>" class="inline-flex items-center px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
        </a>
    </div>
</div>


