<?php
/**
 * Helper Functions
 * Common utility functions used throughout the application
 */

// Get setting value from database
function getSetting($key, $default = '') {
    try {
        $result = db()->fetch("SELECT value FROM settings WHERE key = ?", [$key]);
        return $result ? $result['value'] : $default;
    } catch (Exception $e) {
        return $default;
    }
}

// Update setting value
function updateSetting($key, $value) {
    try {
        $exists = db()->fetch("SELECT id FROM settings WHERE key = ?", [$key]);
        if ($exists) {
            db()->query("UPDATE settings SET value = ?, updated_at = CURRENT_TIMESTAMP WHERE key = ?", [$value, $key]);
        } else {
            db()->query("INSERT INTO settings (key, value) VALUES (?, ?)", [$key, $value]);
        }
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Get all settings as array
function getAllSettings() {
    try {
        $results = db()->fetchAll("SELECT key, value FROM settings");
        $settings = [];
        foreach ($results as $row) {
            $settings[$row['key']] = $row['value'];
        }
        return $settings;
    } catch (Exception $e) {
        return [];
    }
}

// Upload file helper
function uploadFile($file, $destination, $allowedTypes = null, $maxSize = null) {
    if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
        return ['success' => false, 'message' => 'File tidak ditemukan.'];
    }
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'Ukuran file melebihi batas server.',
            UPLOAD_ERR_FORM_SIZE => 'Ukuran file melebihi batas form.',
            UPLOAD_ERR_PARTIAL => 'File hanya terupload sebagian.',
            UPLOAD_ERR_NO_FILE => 'Tidak ada file yang diupload.',
            UPLOAD_ERR_NO_TMP_DIR => 'Folder temporary tidak ditemukan.',
            UPLOAD_ERR_CANT_WRITE => 'Gagal menulis file ke disk.',
            UPLOAD_ERR_EXTENSION => 'Upload dihentikan oleh extension.'
        ];
        return ['success' => false, 'message' => $errors[$file['error']] ?? 'Error upload tidak diketahui.'];
    }
    
    // Check file size
    $maxSize = $maxSize ?? MAX_FILE_SIZE;
    if ($file['size'] > $maxSize) {
        return ['success' => false, 'message' => 'Ukuran file melebihi batas maksimal (' . formatFileSize($maxSize) . ').'];
    }
    
    // Check file type
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowedTypes = $allowedTypes ?? ALLOWED_EXTENSIONS;
    if (!in_array($extension, $allowedTypes)) {
        return ['success' => false, 'message' => 'Tipe file tidak diizinkan. Tipe yang diizinkan: ' . implode(', ', $allowedTypes)];
    }
    
    // Generate unique filename
    $filename = uniqid() . '_' . time() . '.' . $extension;
    $filepath = rtrim($destination, '/') . '/' . $filename;
    
    // Create directory if not exists
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        return [
            'success' => true,
            'filename' => $filename,
            'filepath' => $filepath,
            'size' => $file['size'],
            'extension' => $extension
        ];
    }
    
    return ['success' => false, 'message' => 'Gagal menyimpan file.'];
}

// Delete file helper
function deleteFile($filepath) {
    if (file_exists($filepath)) {
        return unlink($filepath);
    }
    return false;
}

// Format file size
function formatFileSize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB'];
    $i = 0;
    while ($bytes >= 1024 && $i < count($units) - 1) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, 2) . ' ' . $units[$i];
}

// Generate slug from string
function generateSlug($string) {
    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    return trim($slug, '-');
}

// Truncate text
function truncateText($text, $length = 150, $suffix = '...') {
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . $suffix;
}

// Get current page name
function getCurrentPage() {
    $page = isset($_GET['page']) ? sanitize($_GET['page']) : 'beranda';
    return $page;
}

// Check if current page
function isCurrentPage($page) {
    return getCurrentPage() === $page;
}

// Active class helper for navigation
function activeClass($page, $class = 'active') {
    return isCurrentPage($page) ? $class : '';
}

// Pagination helper
function paginate($totalItems, $currentPage = 1, $perPage = 10) {
    $totalPages = ceil($totalItems / $perPage);
    $currentPage = max(1, min($currentPage, $totalPages));
    $offset = ($currentPage - 1) * $perPage;
    
    return [
        'total_items' => $totalItems,
        'total_pages' => $totalPages,
        'current_page' => $currentPage,
        'per_page' => $perPage,
        'offset' => $offset,
        'has_prev' => $currentPage > 1,
        'has_next' => $currentPage < $totalPages
    ];
}

// Render pagination HTML - Pastel Theme
function renderPagination($pagination, $baseUrl) {
    if ($pagination['total_pages'] <= 1) return '';
    
    $html = '<nav class="flex justify-center mt-8"><ul class="flex space-x-2">';
    
    // Previous button
    if ($pagination['has_prev']) {
        $prevPage = $pagination['current_page'] - 1;
        $html .= '<li><a href="' . $baseUrl . '&p=' . $prevPage . '" class="px-4 py-2 bg-[#2a3142] text-gray-300 rounded-lg hover:bg-[#88c9c9] hover:text-gray-800 transition-colors">&laquo; Prev</a></li>';
    }
    
    // Page numbers
    for ($i = 1; $i <= $pagination['total_pages']; $i++) {
        if ($i == $pagination['current_page']) {
            $html .= '<li><span class="px-4 py-2 bg-[#88c9c9] text-gray-800 rounded-lg">' . $i . '</span></li>';
        } else {
            $html .= '<li><a href="' . $baseUrl . '&p=' . $i . '" class="px-4 py-2 bg-[#2a3142] text-gray-300 rounded-lg hover:bg-[#88c9c9] hover:text-gray-800 transition-colors">' . $i . '</a></li>';
        }
    }
    
    // Next button
    if ($pagination['has_next']) {
        $nextPage = $pagination['current_page'] + 1;
        $html .= '<li><a href="' . $baseUrl . '&p=' . $nextPage . '" class="px-4 py-2 bg-[#2a3142] text-gray-300 rounded-lg hover:bg-[#88c9c9] hover:text-gray-800 transition-colors">Next &raquo;</a></li>';
    }
    
    $html .= '</ul></nav>';
    return $html;
}

// Get organization structure
function getOrganizationStructure() {
    try {
        return db()->fetchAll("SELECT * FROM organization_structure WHERE is_active = TRUE ORDER BY order_index ASC");
    } catch (Exception $e) {
        return [];
    }
}

// Get team members (development credits)
function getTeamMembers() {
    try {
        return db()->fetchAll("SELECT * FROM team_members WHERE is_active = TRUE ORDER BY id ASC");
    } catch (Exception $e) {
        return [];
    }
}

// Get external links
function getExternalLinks() {
    try {
        return db()->fetchAll("SELECT * FROM external_links WHERE is_active = TRUE ORDER BY order_index ASC");
    } catch (Exception $e) {
        return [];
    }
}

// Get recent agenda
function getAgenda($limit = 5, $upcoming = true) {
    try {
        $condition = $upcoming ? "event_date >= CURRENT_DATE" : "event_date < CURRENT_DATE";
        $order = $upcoming ? "ASC" : "DESC";
        return db()->fetchAll(
            "SELECT * FROM agenda WHERE is_active = TRUE AND $condition ORDER BY event_date $order LIMIT ?",
            [$limit]
        );
    } catch (Exception $e) {
        return [];
    }
}

// Get gallery items
function getGallery($category = null, $limit = 12, $offset = 0) {
    try {
        $sql = "SELECT * FROM gallery WHERE is_active = TRUE";
        $params = [];
        
        if ($category) {
            $sql .= " AND category = ?";
            $params[] = $category;
        }
        
        $sql .= " ORDER BY created_at DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;
        
        return db()->fetchAll($sql, $params);
    } catch (Exception $e) {
        return [];
    }
}

// Get documents (research/community service)
function getDocuments($category, $limit = 10, $offset = 0) {
    try {
        return db()->fetchAll(
            "SELECT * FROM documents WHERE is_active = TRUE AND category = ? ORDER BY publication_date DESC, created_at DESC LIMIT ? OFFSET ?",
            [$category, $limit, $offset]
        );
    } catch (Exception $e) {
        return [];
    }
}

// Get services
function getServices($category = null) {
    try {
        $sql = "SELECT * FROM services WHERE is_active = TRUE";
        $params = [];
        
        if ($category) {
            $sql .= " AND category = ?";
            $params[] = $category;
        }
        
        $sql .= " ORDER BY order_index ASC";
        return db()->fetchAll($sql, $params);
    } catch (Exception $e) {
        return [];
    }
}

// Count items helper
function countItems($table, $conditions = '') {
    try {
        $sql = "SELECT COUNT(*) as total FROM $table";
        if ($conditions) {
            $sql .= " WHERE $conditions";
        }
        $result = db()->fetch($sql);
        return $result['total'] ?? 0;
    } catch (Exception $e) {
        return 0;
    }
}

// Increment download count
function incrementDownload($documentId) {
    try {
        db()->query("UPDATE documents SET download_count = download_count + 1 WHERE id = ?", [$documentId]);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Save comment/message
function saveComment($data) {
    try {
        db()->query(
            "INSERT INTO comments (name, email, subject, message, ip_address) VALUES (?, ?, ?, ?, ?)",
            [$data['name'], $data['email'], $data['subject'] ?? '', $data['message'], $_SERVER['REMOTE_ADDR'] ?? '']
        );
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Get focus areas (Bidang Fokus Lab)
function getFocusAreas() {
    try {
        return db()->fetchAll("SELECT * FROM focus_areas WHERE is_active = TRUE ORDER BY order_index ASC");
    } catch (Exception $e) {
        return [];
    }
}

// Get roadmap items
function getRoadmap() {
    try {
        return db()->fetchAll("SELECT * FROM roadmap WHERE is_active = TRUE ORDER BY year ASC, order_index ASC");
    } catch (Exception $e) {
        return [];
    }
}

