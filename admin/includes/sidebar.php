<?php
/**
 * Admin Sidebar Navigation - Responsive
 */

$currentPage = $adminPage ?? 'dashboard';
$user = $_SESSION['user_name'] ?? 'Admin';
?>

<!-- Mobile Header Bar -->
<div class="lg:hidden fixed top-0 left-0 right-0 bg-gray-800 border-b border-gray-700 z-30 px-4 py-3 flex items-center justify-between">
    <button onclick="toggleSidebar()" class="text-gray-300 hover:text-white p-2">
        <i class="fas fa-bars text-xl"></i>
    </button>
    <div class="flex items-center space-x-2">
        <div class="w-8 h-8 bg-gradient-to-br from-pastel-teal to-pastel-sky rounded-lg flex items-center justify-center">
            <i class="fas fa-shield-alt text-gray-800 text-sm"></i>
        </div>
        <span class="font-bold text-white">NCS Admin</span>
    </div>
    <a href="<?= baseUrl('admin/?p=logout') ?>" class="text-gray-400 hover:text-red-400 p-2">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</div>

<!-- Sidebar -->
<aside id="admin-sidebar" class="fixed lg:static inset-y-0 left-0 w-64 bg-gray-800 min-h-screen flex flex-col z-50 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-700">
        <div class="flex items-center justify-between">
            <a href="<?= baseUrl() ?>" class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-pastel-teal to-pastel-sky rounded-lg flex items-center justify-center">
                    <i class="fas fa-shield-alt text-gray-800"></i>
                </div>
                <div>
                    <span class="font-bold text-white block">NCS Lab</span>
                    <span class="text-xs text-gray-400">Admin Panel</span>
                </div>
            </a>
            <!-- Close button for mobile -->
            <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        <a href="<?= baseUrl('admin/?p=dashboard') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
            <i class="fas fa-tachometer-alt w-5 mr-3"></i>
            Dashboard
        </a>
        
        <div class="pt-4 pb-2">
            <span class="px-4 text-xs text-gray-500 uppercase tracking-wider">Konten</span>
        </div>
        
        <a href="<?= baseUrl('admin/?p=agenda') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'agenda' ? 'active' : '' ?>">
            <i class="fas fa-calendar-alt w-5 mr-3"></i>
            Agenda
        </a>
        
        <a href="<?= baseUrl('admin/?p=gallery') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'gallery' ? 'active' : '' ?>">
            <i class="fas fa-images w-5 mr-3"></i>
            Galeri
        </a>
        
        <a href="<?= baseUrl('admin/?p=documents') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'documents' ? 'active' : '' ?>">
            <i class="fas fa-file-pdf w-5 mr-3"></i>
            Dokumen
        </a>
        
        <a href="<?= baseUrl('admin/?p=services') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'services' ? 'active' : '' ?>">
            <i class="fas fa-concierge-bell w-5 mr-3"></i>
            Layanan
        </a>
        
        <a href="<?= baseUrl('admin/?p=focus-areas') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'focus-areas' ? 'active' : '' ?>">
            <i class="fas fa-crosshairs w-5 mr-3"></i>
            Bidang Fokus
        </a>
        
        <a href="<?= baseUrl('admin/?p=roadmap') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'roadmap' ? 'active' : '' ?>">
            <i class="fas fa-road w-5 mr-3"></i>
            Roadmap
        </a>
        
        <div class="pt-4 pb-2">
            <span class="px-4 text-xs text-gray-500 uppercase tracking-wider">Organisasi</span>
        </div>
        
        <a href="<?= baseUrl('admin/?p=organization') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'organization' ? 'active' : '' ?>">
            <i class="fas fa-sitemap w-5 mr-3"></i>
            Struktur Organisasi
        </a>
        
        <a href="<?= baseUrl('admin/?p=team') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'team' ? 'active' : '' ?>">
            <i class="fas fa-users w-5 mr-3"></i>
            Tim Pengembang
        </a>
        
        <a href="<?= baseUrl('admin/?p=links') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'links' ? 'active' : '' ?>">
            <i class="fas fa-link w-5 mr-3"></i>
            Link Eksternal
        </a>
        
        <div class="pt-4 pb-2">
            <span class="px-4 text-xs text-gray-500 uppercase tracking-wider">Sistem</span>
        </div>
        
        <a href="<?= baseUrl('admin/?p=comments') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'comments' ? 'active' : '' ?>">
            <i class="fas fa-envelope w-5 mr-3"></i>
            Pesan
            <?php 
            $unreadCount = countItems('comments', 'is_read = FALSE');
            if ($unreadCount > 0): 
            ?>
            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full"><?= $unreadCount ?></span>
            <?php endif; ?>
        </a>
        
        <a href="<?= baseUrl('admin/?p=settings') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'settings' ? 'active' : '' ?>">
            <i class="fas fa-cog w-5 mr-3"></i>
            Pengaturan
        </a>
        
        <a href="<?= baseUrl('admin/?p=users') ?>" 
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg border-l-4 border-transparent hover:bg-gray-700/50 transition-colors <?= $currentPage === 'users' ? 'active' : '' ?>">
            <i class="fas fa-user-cog w-5 mr-3"></i>
            Manajemen User
        </a>
    </nav>
    
    <!-- User Info -->
    <div class="p-4 border-t border-gray-700">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-pastel-teal rounded-full flex items-center justify-center">
                    <span class="text-gray-800 font-semibold"><?= strtoupper(substr($user, 0, 1)) ?></span>
                </div>
                <div>
                    <span class="text-white text-sm font-medium block"><?= htmlspecialchars($user) ?></span>
                    <span class="text-gray-500 text-xs">Administrator</span>
                </div>
            </div>
            <a href="<?= baseUrl('admin/?p=logout') ?>" class="text-gray-400 hover:text-red-400 transition-colors" title="Logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
</aside>

<!-- Main Content Wrapper -->
<main class="flex-1 lg:ml-0 min-h-screen pt-16 lg:pt-0">
