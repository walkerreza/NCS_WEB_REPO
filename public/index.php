<?php
/**
 * Main Entry Point
 * Routes all requests to appropriate pages
 */

// Load configuration
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/functions.php';

// Get current page from URL
$page = getCurrentPage();

// Define valid pages
$validPages = [
    'beranda',
    'visi-misi',
    'struktur',
    'fokus',
    'roadmap',
    'agenda',
    'galeri',
    'penelitian',
    'pengabdian',
    'sarana',
    'konsultatif',
    'link',
    'contact-submit',
    'download'
];

// Check if page is valid
$is404 = false;
if (!in_array($page, $validPages)) {
    $is404 = true;
    $page = '404';
    http_response_code(404);
}

// Handle special routes (AJAX, downloads)
if ($page === 'contact-submit') {
    // Handle contact form submission
    header('Content-Type: application/json');
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['success' => false, 'message' => 'Method tidak diizinkan.']);
        exit;
    }
    
    // Verify CSRF token
    if (!verify_csrf($_POST['csrf_token'] ?? '')) {
        echo json_encode(['success' => false, 'message' => 'Token tidak valid.']);
        exit;
    }
    
    // Validate input
    $name = sanitize($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $subject = sanitize($_POST['subject'] ?? '');
    $message = sanitize($_POST['message'] ?? '');
    
    if (empty($name) || !$email || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Mohon lengkapi semua field yang wajib diisi.']);
        exit;
    }
    
    // Save comment
    $result = saveComment([
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ]);
    
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Pesan berhasil dikirim.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menyimpan pesan. Silakan coba lagi.']);
    }
    exit;
}

if ($page === 'download') {
    // Handle file download
    $id = (int)($_GET['id'] ?? 0);
    
    if ($id <= 0) {
        header('HTTP/1.0 404 Not Found');
        exit('File tidak ditemukan.');
    }
    
    try {
        $document = db()->fetch("SELECT * FROM documents WHERE id = ? AND is_active = TRUE", [$id]);
        
        if (!$document) {
            header('HTTP/1.0 404 Not Found');
            exit('File tidak ditemukan.');
        }
        
        $filepath = DOCUMENT_PATH . '/' . $document['file_path'];
        
        if (!file_exists($filepath)) {
            header('HTTP/1.0 404 Not Found');
            exit('File tidak ditemukan.');
        }
        
        // Increment download count
        incrementDownload($id);
        
        // Send file
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($document['file_path']) . '"');
        header('Content-Length: ' . filesize($filepath));
        header('Cache-Control: no-cache, must-revalidate');
        
        readfile($filepath);
        exit;
        
    } catch (Exception $e) {
        header('HTTP/1.0 500 Internal Server Error');
        exit('Terjadi kesalahan.');
    }
}

// Set page title based on current page
$pageTitles = [
    'beranda' => 'Beranda',
    'visi-misi' => 'Visi & Misi',
    'struktur' => 'Struktur Organisasi',
    'fokus' => 'Bidang Fokus',
    'roadmap' => 'Roadmap',
    'agenda' => 'Agenda Kegiatan',
    'galeri' => 'Galeri Kegiatan',
    'penelitian' => 'Arsip Penelitian',
    'pengabdian' => 'Arsip Pengabdian',
    'sarana' => 'Sarana & Prasarana',
    'konsultatif' => 'Layanan Konsultatif',
    'link' => 'Link Terkait',
    '404' => 'Halaman Tidak Ditemukan'
];

$pageTitle = ($pageTitles[$page] ?? 'Beranda') . ' - ' . APP_NAME;

// Include header
include __DIR__ . '/../includes/header.php';

// Include navbar
include __DIR__ . '/../includes/navbar.php';

// Include page content
$pageFile = __DIR__ . '/../pages/' . $page . '.php';
if (file_exists($pageFile)) {
    include $pageFile;
} else {
    include __DIR__ . '/../pages/beranda.php';
}

// Include footer
include __DIR__ . '/../includes/footer.php';

