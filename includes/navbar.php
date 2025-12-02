<?php
/**
 * Navigation Bar Include
 * Main navigation with dropdown menus - Pastel Theme
 */

$currentPage = getCurrentPage();
$siteLogo = $settings['site_logo'] ?? '';
?>

<!-- Top Notification Bar - Pastel Gradient -->
<div class="bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 text-center py-2.5 text-sm font-medium">
    <div class="container mx-auto px-4 flex items-center justify-center space-x-4">
        <span><i class="fas fa-shield-alt mr-2"></i>Network & Cyber Security Laboratory</span>
        <span class="hidden md:inline text-gray-600">|</span>
        <span class="hidden md:inline"><i class="fas fa-envelope mr-2"></i><?= htmlspecialchars($settings['contact_email'] ?? 'ncslab@polinema.ac.id') ?></span>
    </div>
</div>

<!-- Main Navigation -->
<nav class="glass-nav sticky top-0 z-50 border-b border-[#3a4255]">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="<?= baseUrl() ?>" class="flex items-center space-x-3 group">
                <?php if (!empty($siteLogo)): ?>
                    <img src="<?= uploadUrl('images/' . $siteLogo) ?>" alt="Logo" class="h-12 w-auto">
                <?php else: ?>
                    <div class="w-12 h-12 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-xl flex items-center justify-center group-hover:shadow-lg group-hover:shadow-[#88c9c9]/20 transition-all">
                        <i class="fas fa-shield-alt text-gray-800 text-xl"></i>
                    </div>
                <?php endif; ?>
                <div class="hidden sm:block">
                    <span class="font-display font-semibold text-xl text-white tracking-wide">NCS</span>
                    <span class="block text-xs text-[#88c9c9]">Laboratory</span>
                </div>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-1">
                <!-- Beranda -->
                <a href="<?= baseUrl() ?>" 
                   class="px-4 py-2 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all <?= $currentPage === 'beranda' ? 'text-[#a8e6cf] bg-[#2a3142]' : '' ?>">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>
                
                <!-- Profil Dropdown -->
                <div class="dropdown relative">
                    <button class="px-4 py-2 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center <?= in_array($currentPage, ['visi-misi', 'struktur', 'fokus', 'roadmap']) ? 'text-[#a8e6cf] bg-[#2a3142]' : '' ?>">
                        <i class="fas fa-building mr-2"></i>Profil
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div class="dropdown-content absolute top-full left-0 mt-2 w-56 bg-[#242b3d] border border-[#3a4255] rounded-xl shadow-xl overflow-hidden">
                        <a href="<?= baseUrl('?page=visi-misi') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors border-b border-[#3a4255]">
                            <i class="fas fa-bullseye w-6"></i>Visi & Misi
                        </a>
                        <a href="<?= baseUrl('?page=struktur') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors border-b border-[#3a4255]">
                            <i class="fas fa-sitemap w-6"></i>Struktur Organisasi
                        </a>
                        <a href="<?= baseUrl('?page=fokus') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors border-b border-[#3a4255]">
                            <i class="fas fa-crosshairs w-6"></i>Bidang Fokus
                        </a>
                        <a href="<?= baseUrl('?page=roadmap') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors">
                            <i class="fas fa-road w-6"></i>Roadmap
                        </a>
                    </div>
                </div>
                
                <!-- Galeri Dropdown -->
                <div class="dropdown relative">
                    <button class="px-4 py-2 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center <?= in_array($currentPage, ['agenda', 'galeri']) ? 'text-[#a8e6cf] bg-[#2a3142]' : '' ?>">
                        <i class="fas fa-images mr-2"></i>Galeri
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div class="dropdown-content absolute top-full left-0 mt-2 w-56 bg-[#242b3d] border border-[#3a4255] rounded-xl shadow-xl overflow-hidden">
                        <a href="<?= baseUrl('?page=agenda') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors border-b border-[#3a4255]">
                            <i class="fas fa-calendar-alt w-6"></i>Agenda
                        </a>
                        <a href="<?= baseUrl('?page=galeri') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors">
                            <i class="fas fa-photo-video w-6"></i>Kegiatan
                        </a>
                    </div>
                </div>
                
                <!-- Arsip Dropdown -->
                <div class="dropdown relative">
                    <button class="px-4 py-2 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center <?= in_array($currentPage, ['penelitian', 'pengabdian']) ? 'text-[#a8e6cf] bg-[#2a3142]' : '' ?>">
                        <i class="fas fa-archive mr-2"></i>Arsip
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div class="dropdown-content absolute top-full left-0 mt-2 w-56 bg-[#242b3d] border border-[#3a4255] rounded-xl shadow-xl overflow-hidden">
                        <a href="<?= baseUrl('?page=penelitian') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors border-b border-[#3a4255]">
                            <i class="fas fa-flask w-6"></i>Penelitian
                        </a>
                        <a href="<?= baseUrl('?page=pengabdian') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors">
                            <i class="fas fa-hands-helping w-6"></i>Pengabdian
                        </a>
                    </div>
                </div>
                
                <!-- Layanan Dropdown -->
                <div class="dropdown relative">
                    <button class="px-4 py-2 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center <?= in_array($currentPage, ['sarana', 'konsultatif']) ? 'text-[#a8e6cf] bg-[#2a3142]' : '' ?>">
                        <i class="fas fa-concierge-bell mr-2"></i>Layanan
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div class="dropdown-content absolute top-full left-0 mt-2 w-56 bg-[#242b3d] border border-[#3a4255] rounded-xl shadow-xl overflow-hidden">
                        <a href="<?= baseUrl('?page=sarana') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors border-b border-[#3a4255]">
                            <i class="fas fa-server w-6"></i>Sarana & Prasarana
                        </a>
                        <a href="<?= baseUrl('?page=konsultatif') ?>" class="block px-4 py-3 text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-colors">
                            <i class="fas fa-headset w-6"></i>Konsultatif
                        </a>
                    </div>
                </div>
                
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden bg-[#242b3d] border-t border-[#3a4255]">
        <div class="container mx-auto px-4 py-4 space-y-2">
            <a href="<?= baseUrl() ?>" class="block px-4 py-3 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all">
                <i class="fas fa-home mr-3"></i>Beranda
            </a>
            
            <!-- Mobile Profil Submenu -->
            <div class="mobile-dropdown">
                <button class="w-full px-4 py-3 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center justify-between">
                    <span><i class="fas fa-building mr-3"></i>Profil</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-8 space-y-1 mt-2">
                    <a href="<?= baseUrl('?page=visi-misi') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Visi & Misi</a>
                    <a href="<?= baseUrl('?page=struktur') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Struktur Organisasi</a>
                    <a href="<?= baseUrl('?page=fokus') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Bidang Fokus</a>
                    <a href="<?= baseUrl('?page=roadmap') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Roadmap</a>
                </div>
            </div>
            
            <!-- Mobile Galeri Submenu -->
            <div class="mobile-dropdown">
                <button class="w-full px-4 py-3 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center justify-between">
                    <span><i class="fas fa-images mr-3"></i>Galeri</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-8 space-y-1 mt-2">
                    <a href="<?= baseUrl('?page=agenda') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Agenda</a>
                    <a href="<?= baseUrl('?page=galeri') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Kegiatan</a>
                </div>
            </div>
            
            <!-- Mobile Arsip Submenu -->
            <div class="mobile-dropdown">
                <button class="w-full px-4 py-3 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center justify-between">
                    <span><i class="fas fa-archive mr-3"></i>Arsip</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-8 space-y-1 mt-2">
                    <a href="<?= baseUrl('?page=penelitian') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Penelitian</a>
                    <a href="<?= baseUrl('?page=pengabdian') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Pengabdian</a>
                </div>
            </div>
            
            <!-- Mobile Layanan Submenu -->
            <div class="mobile-dropdown">
                <button class="w-full px-4 py-3 rounded-lg text-gray-300 hover:text-[#a8e6cf] hover:bg-[#2a3142] transition-all flex items-center justify-between">
                    <span><i class="fas fa-concierge-bell mr-3"></i>Layanan</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-8 space-y-1 mt-2">
                    <a href="<?= baseUrl('?page=sarana') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Sarana & Prasarana</a>
                    <a href="<?= baseUrl('?page=konsultatif') ?>" class="block px-4 py-2 text-gray-400 hover:text-[#a8e6cf] transition-colors">Konsultatif</a>
                </div>
            </div>
            
        </div>
    </div>
</nav>
