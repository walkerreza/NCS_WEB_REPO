<?php
/**
 * Application Configuration
 * Global settings and constants
 */

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load database configuration
require_once __DIR__ . '/database.php';

// Application constants
define('APP_NAME', getenv('APP_NAME') ?: 'NCS Laboratory');
define('APP_URL', getenv('APP_URL') ?: 'http://localhost/ncs');
define('APP_DEBUG', getenv('APP_DEBUG') === 'true');
define('MAX_FILE_SIZE', (int)(getenv('MAX_FILE_SIZE') ?: 5242880)); // 5MB default for images
define('MAX_VIDEO_SIZE', (int)(getenv('MAX_VIDEO_SIZE') ?: 104857600)); // 100MB default for videos
define('ALLOWED_EXTENSIONS', explode(',', getenv('ALLOWED_EXTENSIONS') ?: 'pdf,jpg,jpeg,png,gif'));
define('ALLOWED_VIDEO_EXTENSIONS', ['mp4', 'webm', 'ogg', 'mov']);

// Path constants
define('ROOT_PATH', dirname(__DIR__));
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('UPLOAD_PATH', PUBLIC_PATH . '/uploads');
define('DOCUMENT_PATH', UPLOAD_PATH . '/documents');
define('IMAGE_PATH', UPLOAD_PATH . '/images');

// Create upload directories if not exist
$directories = [UPLOAD_PATH, DOCUMENT_PATH, IMAGE_PATH];
foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Error handling based on debug mode
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Timezone setting
date_default_timezone_set('Asia/Jakarta');

// Helper function for base URL
function baseUrl($path = '') {
    return rtrim(APP_URL, '/') . '/' . ltrim($path, '/');
}

// Helper function for assets URL
function asset($path) {
    return baseUrl('public/assets/' . ltrim($path, '/'));
}

// Helper function for upload URL
function uploadUrl($path) {
    return baseUrl('public/uploads/' . ltrim($path, '/'));
}

// Flash message helper
function setFlash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

// Security helpers
function csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field() {
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

function verify_csrf($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Sanitize input helper
function sanitize($input) {
    if (is_array($input)) {
        return array_map('sanitize', $input);
    }
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Check if user is admin
function isAdmin() {
    return isLoggedIn() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

// Redirect helper
function redirect($url) {
    header("Location: $url");
    exit;
}

// Format date in Indonesian
function formatDate($date, $format = 'd F Y') {
    $months = [
        'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
        'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
        'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
        'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
    ];
    
    $formatted = date($format, strtotime($date));
    return strtr($formatted, $months);
}

