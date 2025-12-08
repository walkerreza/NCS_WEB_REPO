<?php
/**
 * Import Script for JTI Polinema Scraped Data
 * This script imports data from jti_polinema_scrape.json into the NCS database
 * 
 * Run from command line: php import_jti_data.php
 */

require_once __DIR__ . '/config/database.php';

// Get database instance
$db = db();
$pdo = $db->getConnection();

// Load JSON data
$jsonFile = __DIR__ . '/jti_polinema_scrape.json';
if (!file_exists($jsonFile)) {
    die("Error: File jti_polinema_scrape.json tidak ditemukan!\n");
}

$jsonData = json_decode(file_get_contents($jsonFile), true);
if ($jsonData === null) {
    die("Error: Gagal parsing JSON data!\n");
}

echo "=== Memulai Import Data JTI Polinema ===\n\n";

// Counter for tracking imports
$imported = [
    'settings' => 0,
    'focus_areas' => 0,
    'services' => 0,
    'documents' => 0,
    'external_links' => 0
];

/**
 * 1. Import Visi, Misi, Tujuan to Settings
 */
echo "[1] Importing Visi, Misi, Tujuan...\n";

foreach ($jsonData as $page) {
    if (strpos($page['url'], 'visi-misi-dan-tujuan') !== false && $page['success']) {
        $content = $page['content'];
        
        // Extract Visi
        if (preg_match('/Visi\n(.+?)\nMisi/s', $content, $matches)) {
            $visi = trim($matches[1]);
            updateSetting($pdo, 'visi', $visi);
            $imported['settings']++;
            echo "   ✓ Visi berhasil diimport\n";
        }
        
        // Extract Misi
        if (preg_match('/Misi\nMisi Jurusan.*?:\n(.+?)\nTujuan/s', $content, $matches)) {
            $misi = trim($matches[1]);
            updateSetting($pdo, 'misi', $misi);
            $imported['settings']++;
            echo "   ✓ Misi berhasil diimport\n";
        }
        
        // Extract Tujuan
        if (preg_match('/Tujuan\nTujuan Teknologi Informasi.*?:\n(.+?)BLU POLITEKNIK/s', $content, $matches)) {
            $tujuan = trim($matches[1]);
            // Add tujuan as a new setting if not exists
            insertSettingIfNotExists($pdo, 'tujuan', $tujuan, 'textarea', 'Tujuan laboratorium');
            $imported['settings']++;
            echo "   ✓ Tujuan berhasil diimport\n";
        }
        
        break;
    }
}

/**
 * 2. Import Laboratorium Data to Focus Areas
 */
echo "\n[2] Importing Laboratorium Data to Focus Areas...\n";

$labData = [
    [
        'url_contains' => 'laboratorium-jaringan-dan-keamanan-siber',
        'title' => 'Laboratorium Jaringan dan Keamanan Siber',
        'icon' => 'shield-alt',
        'focus_riset' => ['Network Administration & Engineering', 'Cyber Defense', 'Offense Security']
    ],
    [
        'url_contains' => 'laboratorium-rekayasa-perangkat-lunak',
        'title' => 'Laboratorium Rekayasa Perangkat Lunak',
        'icon' => 'code',
        'focus_riset' => ['Software Engineering Methodologies and Architecture', 'Domain-Specific Software Engineering Applications', 'Emerging Technologies in Software Engineering']
    ],
    [
        'url_contains' => 'laboratorium-sistem-informasi',
        'title' => 'Laboratorium Sistem Informasi',
        'icon' => 'database',
        'focus_riset' => ['Information Engineering', 'Learning Engineering', 'Learning Technology', 'Information Technology']
    ],
    [
        'url_contains' => 'laboratorium-analisa-bisnis',
        'title' => 'Laboratorium Analisa Bisnis',
        'icon' => 'chart-line',
        'focus_riset' => ['Anomaly Detection', 'Identity Theft', 'Fraud Detection', 'Brand Image Analysis', 'Customer Analytics', 'Digital Marketing Analysis']
    ],
    [
        'url_contains' => 'laboratorium-multimedia-dan-perangkat-bergerak',
        'title' => 'Laboratorium Multimedia dan Perangkat Bergerak',
        'icon' => 'mobile-alt',
        'focus_riset' => ['Disabilitas & Inklusif', 'UI/UX', 'Games', 'VR (Realitas Virtual)', 'AR (Realitas Tertambah)', 'MR (Realitas Campuran)']
    ],
    [
        'url_contains' => 'laboratorium-informatika-terapan',
        'title' => 'Laboratorium Informatika Terapan',
        'icon' => 'laptop-code',
        'focus_riset' => ['Intelligent Self-Learning of Computer Programming', 'Smartfarming', 'Security Information and Event Management', 'Sistem Desentralisasi Berbasis Blockchain']
    ]
];

foreach ($jsonData as $page) {
    if (!$page['success']) continue;
    
    foreach ($labData as $lab) {
        if (strpos($page['url'], $lab['url_contains']) !== false) {
            // Extract description from content
            $description = '';
            if (preg_match('/PROFIL LABORATORIUM\n(.+?)(?:VISI|Play)/s', $page['content'], $matches)) {
                $description = trim($matches[1]);
            }
            
            // Add focus riset info to description
            $focusRiset = "Fokus Riset: " . implode(', ', $lab['focus_riset']);
            $fullDescription = $description . "\n\n" . $focusRiset;
            
            // Insert to focus_areas
            insertFocusArea($pdo, $lab['title'], $fullDescription, $lab['icon']);
            $imported['focus_areas']++;
            echo "   ✓ {$lab['title']} berhasil diimport\n";
            
            break;
        }
    }
}

/**
 * 3. Import Sarana dan Prasarana to Services
 */
echo "\n[3] Importing Sarana dan Prasarana...\n";

foreach ($jsonData as $page) {
    if (strpos($page['url'], 'sarana-dan-prasarana') !== false && $page['success']) {
        $content = $page['content'];
        
        // Extract main description
        if (preg_match('/Sarana dan Prasarana\n(.+?)BLU POLITEKNIK/s', $content, $matches)) {
            $description = trim($matches[1]);
            
            // Create a comprehensive service entry
            insertService($pdo, 'Sarana dan Prasarana JTI', $description, 'sarana', 'building');
            $imported['services']++;
            echo "   ✓ Sarana dan Prasarana berhasil diimport\n";
        }
        
        break;
    }
}

// Import additional services from lab pages
$labServices = [
    [
        'title' => 'Workstation High-End',
        'description' => 'Disediakan workstation dengan spesifikasi tinggi untuk tugas akhir komputasi berat, pemrosesan data besar, dan simulasi lanjutan.',
        'category' => 'sarana',
        'icon' => 'desktop'
    ],
    [
        'title' => 'Studio Pengembangan Software',
        'description' => 'Workstation untuk pengembangan perangkat lunak dengan dukungan IDE (VS Code, IntelliJ, Android Studio), bahasa pemrograman beragam, serta manajemen dependensi dan paket.',
        'category' => 'sarana',
        'icon' => 'code'
    ],
    [
        'title' => 'Ruang Pengujian & QA',
        'description' => 'Perangkat uji untuk unit test, integration test, end-to-end test, serta alat otomasi pengujian (JUnit, Jest, Cypress) dan pengukuran kualitas kode (coverage, static analysis).',
        'category' => 'sarana',
        'icon' => 'vial'
    ],
    [
        'title' => 'DevOps & Version Control',
        'description' => 'Server CI/CD, registry container, serta repositori Git (GitLab/GitHub) untuk integrasi berkelanjutan, deployment otomatis, dan kolaborasi pengembangan.',
        'category' => 'sarana',
        'icon' => 'sync-alt'
    ],
    [
        'title' => 'Perangkat VR/AR',
        'description' => 'Headset VR, berbagai sensor interaktif, Personal Computer dengan spesifikasi Gamers untuk pengembangan aplikasi multimedia dan perangkat bergerak.',
        'category' => 'sarana',
        'icon' => 'vr-cardboard'
    ],
    [
        'title' => 'EEG Equipment',
        'description' => 'All-In-One EEG Electrode Cap Bundle untuk merekam aktivitas listrik otak. Mendukung penelitian di bidang Learning Analytics dan Cognitive Computing.',
        'category' => 'sarana',
        'icon' => 'brain'
    ]
];

foreach ($labServices as $service) {
    insertService($pdo, $service['title'], $service['description'], $service['category'], $service['icon']);
    $imported['services']++;
    echo "   ✓ {$service['title']} berhasil diimport\n";
}

/**
 * 4. Import Pengabdian Data to Documents
 */
echo "\n[4] Importing Data Pengabdian...\n";

foreach ($jsonData as $page) {
    // Match pages with pengabdian tahun data
    if (preg_match('/pengabdian-tahun-(\d{4})/', $page['url'], $yearMatch) && $page['success']) {
        $year = $yearMatch[1];
        
        if (!empty($page['tables'])) {
            $currentEntry = null;
            
            foreach ($page['tables'] as $row) {
                // Check if this is a main entry (has NAMA KETUA PENGABDIAN)
                if (isset($row['NAMA KETUA PENGABDIAN']) && !empty($row['NAMA KETUA PENGABDIAN'])) {
                    // Save previous entry if exists
                    if ($currentEntry !== null) {
                        insertPengabdianDocument($pdo, $currentEntry, $year);
                        $imported['documents']++;
                    }
                    
                    // Start new entry
                    $currentEntry = [
                        'ketua' => $row['NAMA KETUA PENGABDIAN'],
                        'anggota' => [],
                        'prodi' => $row['PRODI'] ?? '',
                        'judul' => $row['JUDUL PENGABDIAN'] ?? '',
                        'skema' => $row['SKEMA'] ?? ''
                    ];
                    
                    // Add first anggota if exists
                    if (isset($row['NAMA ANGGOTA']) && !empty($row['NAMA ANGGOTA'])) {
                        $currentEntry['anggota'][] = preg_replace('/^\d+\.\s*/', '', $row['NAMA ANGGOTA']);
                    }
                } else if ($currentEntry !== null && isset($row['NO'])) {
                    // This is an anggota row (NO contains number or anggota name)
                    $anggota = $row['NO'];
                    // Clean up the anggota name (remove leading number)
                    $anggota = preg_replace('/^\d+\.\s*/', '', $anggota);
                    if (!empty($anggota) && !is_numeric($anggota)) {
                        $currentEntry['anggota'][] = $anggota;
                    }
                }
            }
            
            // Save last entry
            if ($currentEntry !== null) {
                insertPengabdianDocument($pdo, $currentEntry, $year);
                $imported['documents']++;
            }
            
            echo "   ✓ Pengabdian Tahun $year berhasil diimport\n";
        }
    }
}

/**
 * 5. Import SINTA Links to External Links
 */
echo "\n[5] Importing SINTA Links...\n";

$sintaLinksAdded = [];
foreach ($jsonData as $page) {
    if (!empty($page['sinta_links'])) {
        foreach ($page['sinta_links'] as $sintaLink) {
            // Skip duplicates
            if (in_array($sintaLink['url'], $sintaLinksAdded)) continue;
            
            // Extract lab name from page title
            $labName = '';
            if (preg_match('/Laboratorium (.+?) –/', $page['title'], $matches)) {
                $labName = $matches[1];
            }
            
            $title = "SINTA - $labName";
            $description = "Link SINTA untuk publikasi " . $labName;
            
            insertExternalLink($pdo, $title, $sintaLink['url'], 'book-open', $description);
            $sintaLinksAdded[] = $sintaLink['url'];
            $imported['external_links']++;
            echo "   ✓ $title berhasil diimport\n";
        }
    }
}

// Add main JTI links
$jtiLinks = [
    ['title' => 'JTI Polinema', 'url' => 'https://jti.polinema.ac.id', 'icon' => 'university', 'description' => 'Website resmi Jurusan Teknologi Informasi Polinema'],
    ['title' => 'Polinema', 'url' => 'https://www.polinema.ac.id', 'icon' => 'building', 'description' => 'Website resmi Politeknik Negeri Malang'],
];

foreach ($jtiLinks as $link) {
    insertExternalLink($pdo, $link['title'], $link['url'], $link['icon'], $link['description']);
    $imported['external_links']++;
    echo "   ✓ {$link['title']} berhasil diimport\n";
}

/**
 * Summary
 */
echo "\n=== Import Selesai ===\n";
echo "Settings: {$imported['settings']} records\n";
echo "Focus Areas: {$imported['focus_areas']} records\n";
echo "Services: {$imported['services']} records\n";
echo "Documents (Pengabdian): {$imported['documents']} records\n";
echo "External Links: {$imported['external_links']} records\n";
echo "\nTotal: " . array_sum($imported) . " records imported\n";

/**
 * Helper Functions
 */

function updateSetting($pdo, $key, $value) {
    $stmt = $pdo->prepare("UPDATE settings SET value = ?, updated_at = CURRENT_TIMESTAMP WHERE key = ?");
    $stmt->execute([$value, $key]);
}

function insertSettingIfNotExists($pdo, $key, $value, $type, $description) {
    // Check if exists
    $stmt = $pdo->prepare("SELECT id FROM settings WHERE key = ?");
    $stmt->execute([$key]);
    
    if ($stmt->fetch()) {
        // Update existing
        updateSetting($pdo, $key, $value);
    } else {
        // Insert new
        $stmt = $pdo->prepare("INSERT INTO settings (key, value, type, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$key, $value, $type, $description]);
    }
}

function insertFocusArea($pdo, $title, $description, $icon) {
    // Check if exists
    $stmt = $pdo->prepare("SELECT id FROM focus_areas WHERE title = ?");
    $stmt->execute([$title]);
    
    if ($stmt->fetch()) {
        // Update existing
        $stmt = $pdo->prepare("UPDATE focus_areas SET description = ?, icon = ?, updated_at = CURRENT_TIMESTAMP WHERE title = ?");
        $stmt->execute([$description, $icon, $title]);
    } else {
        // Insert new
        $stmt = $pdo->prepare("INSERT INTO focus_areas (title, description, icon, order_index) VALUES (?, ?, ?, (SELECT COALESCE(MAX(order_index), 0) + 1 FROM focus_areas))");
        $stmt->execute([$title, $description, $icon]);
    }
}

function insertService($pdo, $title, $description, $category, $icon) {
    // Check if exists
    $stmt = $pdo->prepare("SELECT id FROM services WHERE title = ?");
    $stmt->execute([$title]);
    
    if ($stmt->fetch()) {
        // Update existing
        $stmt = $pdo->prepare("UPDATE services SET description = ?, category = ?, icon = ?, updated_at = CURRENT_TIMESTAMP WHERE title = ?");
        $stmt->execute([$description, $category, $icon, $title]);
    } else {
        // Insert new
        $stmt = $pdo->prepare("INSERT INTO services (title, description, category, icon, order_index) VALUES (?, ?, ?, ?, (SELECT COALESCE(MAX(order_index), 0) + 1 FROM services))");
        $stmt->execute([$title, $description, $category, $icon]);
    }
}

function insertPengabdianDocument($pdo, $entry, $year) {
    if (empty($entry['judul'])) return;
    
    // Build author string
    $authors = $entry['ketua'];
    if (!empty($entry['anggota'])) {
        $authors .= ', ' . implode(', ', $entry['anggota']);
    }
    
    // Build description
    $description = "Program Studi: {$entry['prodi']}\nSkema: {$entry['skema']}";
    
    // Build keywords
    $keywords = strtolower($entry['prodi']) . ', pengabdian, ' . $year;
    
    // Check if exists (based on title and author)
    $stmt = $pdo->prepare("SELECT id FROM documents WHERE title = ? AND author = ?");
    $stmt->execute([$entry['judul'], $authors]);
    
    if (!$stmt->fetch()) {
        // Insert new
        $stmt = $pdo->prepare("
            INSERT INTO documents (title, description, file_path, category, author, publication_date, keywords) 
            VALUES (?, ?, ?, 'pengabdian', ?, ?, ?)
        ");
        $filePath = 'pengabdian-' . $year . '-' . substr(md5($entry['judul']), 0, 8) . '.pdf';
        $pubDate = $year . '-01-01';
        $stmt->execute([$entry['judul'], $description, $filePath, $authors, $pubDate, $keywords]);
    }
}

function insertExternalLink($pdo, $title, $url, $icon, $description) {
    // Check if URL exists
    $stmt = $pdo->prepare("SELECT id FROM external_links WHERE url = ?");
    $stmt->execute([$url]);
    
    if (!$stmt->fetch()) {
        // Insert new
        $stmt = $pdo->prepare("INSERT INTO external_links (title, url, icon, description, order_index) VALUES (?, ?, ?, ?, (SELECT COALESCE(MAX(order_index), 0) + 1 FROM external_links))");
        $stmt->execute([$title, $url, $icon, $description]);
    }
}

