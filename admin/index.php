<?php
/**
 * Admin Panel Entry Point - Responsive
 * Routes all admin requests
 */

// Load configuration
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/functions.php';

// Get current admin page
$adminPage = sanitize($_GET['p'] ?? 'dashboard');

// Pages that don't require authentication
$publicPages = ['login', 'logout'];

// Check authentication for protected pages
if (!in_array($adminPage, $publicPages) && !isAdmin()) {
    redirect(baseUrl('admin/?p=login'));
}

// Handle logout
if ($adminPage === 'logout') {
    session_destroy();
    redirect(baseUrl('admin/?p=login'));
}

// Valid admin pages
$validPages = [
    'login',
    'logout',
    'dashboard',
    'settings',
    'users',
    'organization',
    'team',
    'agenda',
    'gallery',
    'documents',
    'services',
    'focus-areas',
    'roadmap',
    'links',
    'comments'
];

if (!in_array($adminPage, $validPages)) {
    $adminPage = '404';
    http_response_code(404);
}

// Set page title
$pageTitles = [
    'login' => 'Login',
    'dashboard' => 'Dashboard',
    'settings' => 'Pengaturan',
    'users' => 'Manajemen User',
    'organization' => 'Struktur Organisasi',
    'team' => 'Tim Pengembang',
    'agenda' => 'Agenda',
    'gallery' => 'Galeri',
    'documents' => 'Dokumen',
    'services' => 'Layanan',
    'focus-areas' => 'Bidang Fokus',
    'roadmap' => 'Roadmap',
    'links' => 'Link Eksternal',
    'comments' => 'Pesan',
    '404' => 'Halaman Tidak Ditemukan'
];

$pageTitle = 'Admin - ' . ($pageTitles[$adminPage] ?? 'Dashboard') . ' | ' . APP_NAME;

// Include admin page
$pageFile = __DIR__ . '/pages/' . $adminPage . '.php';

if ($adminPage === 'login') {
    include $pageFile;
} else {
    include __DIR__ . '/includes/header.php';
    include __DIR__ . '/includes/sidebar.php';
    
    // Content container with responsive padding
    echo '<div class="p-4 sm:p-6 lg:p-8">';
    
    if (file_exists($pageFile)) {
        include $pageFile;
    } else {
        include __DIR__ . '/pages/404.php';
    }
    
    echo '</div>';
    
    include __DIR__ . '/includes/footer.php';
}
