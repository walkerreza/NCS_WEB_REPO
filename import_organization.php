<?php
/**
 * Import Script for JTI Organization Structure
 */

require_once __DIR__ . '/config/database.php';

$db = db();
$pdo = $db->getConnection();

echo "=== Importing Organization Structure ===\n\n";

// Organization data
$organization = [
    // Pimpinan Jurusan
    ['name' => 'Prof. Dr. Eng. Rosa Andrie Asmara, ST., MT.', 'position' => 'Ketua Jurusan', 'order_index' => 1],
    ['name' => 'Mungki Astiningrum, ST., M.Kom.', 'position' => 'Sekretaris Jurusan', 'order_index' => 2],
    
    // Koordinator Program Studi
    ['name' => 'Dr. Eng. Banni Satria Andoko, S. Kom., M.MSI.', 'position' => 'Koordinator Program Studi S2 Magister Terapan Rekayasa Teknologi Informasi', 'order_index' => 3],
    ['name' => 'Dr. Ely Setyo Astuti, ST., MT.', 'position' => 'Koordinator Program Studi D4 Teknik Informatika', 'order_index' => 4],
    ['name' => 'Hendra Pradibta, SE., M.Sc.', 'position' => 'Koordinator Program Studi D4 Sistem Informasi Bisnis', 'order_index' => 5],
    ['name' => 'Pramana Yoga Saputra, S.Kom., MMT.', 'position' => 'Koordinator Program Studi D2 Pengembangan Piranti Lunak Situs', 'order_index' => 6],
    
    // Kepala Laboratorium
    ['name' => 'Erfan Rohadi, ST., M.Eng., Ph.D.', 'position' => 'Kepala Laboratorium Jaringan dan Keamanan Siber', 'order_index' => 7],
    ['name' => 'Imam Fahrur Rozi, ST., MT.', 'position' => 'Kepala Laboratorium Rekayasa Perangkat Lunak', 'order_index' => 8],
    ['name' => 'Prof. Dr. Eng. Rosa Andrie Asmara, ST., MT.', 'position' => 'Kepala Laboratorium Visi Cerdas dan Sistem Cerdas', 'order_index' => 9],
    ['name' => 'Dr. Eng. Banni Satria Andoko, S. Kom., M.MSI.', 'position' => 'Kepala Laboratorium Sistem Informasi', 'order_index' => 10],
    ['name' => 'Dr. Rakhmat Arianto, S.ST., M.Kom.', 'position' => 'Kepala Laboratorium Analisa Bisnis', 'order_index' => 11],
    ['name' => 'Yoppy Yunhasnawa, S.ST., M.Sc.', 'position' => 'Kepala Laboratorium Teknologi Data', 'order_index' => 12],
    ['name' => 'Dimas Wahyu Wibowo, ST., MT.', 'position' => 'Kepala Laboratorium Multimedia dan Perangkat Bergerak', 'order_index' => 13],
    ['name' => 'Ir. Yan Watequlis Syaifuddin, ST., M.MT., Ph. D.', 'position' => 'Kepala Laboratorium Informatika Terapan', 'order_index' => 14],
    
    // Dosen Pembimbing & Majelis
    ['name' => 'Bagas Satya Dian Nugraha, ST., MT.', 'position' => 'Dosen Pembimbing Kemahasiswaan', 'order_index' => 15],
    ['name' => 'Yoppy Yunhasnawa, S.ST., M.Sc.', 'position' => 'Ketua Majelis Skripsi dan Tugas Akhir', 'order_index' => 16],
    
    // Koordinator Kurikulum
    ['name' => 'Dr. Indra Dharma Wijaya, ST., M.MT.', 'position' => 'Koordinator Kurikulum S2 Magister Terapan Rekayasa Teknologi Informasi', 'order_index' => 17],
    ['name' => 'Imam Fahrur Rozi, ST., MT.', 'position' => 'Koordinator Kurikulum D4 Teknik Informatika', 'order_index' => 18],
    ['name' => 'Meyti Eka Apriyani ST., MT.', 'position' => 'Koordinator Kurikulum D4 Sistem Informasi Bisnis', 'order_index' => 19],
    ['name' => 'Endah Septa Sintiya, S.Pd., M.Kom', 'position' => 'Koordinator Kurikulum D2 Pengembangan Piranti Lunak Situs', 'order_index' => 20],
    
    // Koordinator Bidang Keahlian D4 Teknik Informatika
    ['name' => 'Wilda Imama Sabilla, S.Kom., M.Kom', 'position' => 'Koordinator Bidang Keahlian Rekayasa Perangkat Lunak D4 Teknik Informatika', 'order_index' => 21],
    ['name' => "Mamluatul Hani'ah, S.Kom., M.Kom", 'position' => 'Koordinator Bidang Keahlian Visi Cerdas dan Sistem Cerdas D4 Teknik Informatika', 'order_index' => 22],
    ['name' => 'M. Hasyim Ratsanjani, S.Kom., M.Kom', 'position' => 'Koordinator Bidang Keahlian Multimedia dan Perangkat Bergerak D4 Teknik Informatika', 'order_index' => 23],
    ['name' => 'Habibie Ed Dien, S.Kom., M.T.', 'position' => 'Koordinator Bidang Keahlian Jaringan dan Keamanan Siber D4 Teknik Informatika', 'order_index' => 24],
    ['name' => 'Dika Rizky Yunianto, S.Kom, M.Kom', 'position' => 'Koordinator Prakerin & Kerjasama D4 Teknik Informatika', 'order_index' => 25],
    
    // Koordinator Bidang Keahlian D4 Sistem Informasi Bisnis
    ['name' => 'Rokhimatul Wakhidah, S.Pd., M.T.', 'position' => 'Koordinator Bidang Keahlian Sistem Informasi D4 Sistem Informasi Bisnis', 'order_index' => 26],
    ['name' => 'Ir. Rudy Ariyanto, ST., M.Cs.', 'position' => 'Koordinator Bidang Keahlian Analisa Bisnis D4 Sistem Informasi Bisnis', 'order_index' => 27],
    ['name' => 'Agung Nugroho Pramudhita, S.T., M.T.', 'position' => 'Koordinator Bidang Keahlian Teknologi Data D4 Sistem Informasi Bisnis', 'order_index' => 28],
    ['name' => 'Triana Fatmawati, S.T., M.T.', 'position' => 'Koordinator Bidang Keahlian Informatika Terapan D4 Sistem Informasi Bisnis', 'order_index' => 29],
    ['name' => 'Vivin Ayu Lestari, S.Pd., M.Kom.', 'position' => 'Koordinator Prakerin & Kerjasama D4 Sistem Informasi Bisnis', 'order_index' => 30],
    
    // Koordinator D2 PPLS
    ['name' => 'Dika Rizky Yunianto, S.Kom, M.Kom', 'position' => 'Koordinator Prakerin & Kerjasama D2 Pengembangan Piranti Lunak Situs', 'order_index' => 31],
];

$inserted = 0;
$updated = 0;

foreach ($organization as $org) {
    // Check if exists (same name and position)
    $stmt = $pdo->prepare("SELECT id FROM organization_structure WHERE name = ? AND position = ?");
    $stmt->execute([$org['name'], $org['position']]);
    
    if ($stmt->fetch()) {
        // Update existing
        $stmt = $pdo->prepare("UPDATE organization_structure SET order_index = ?, updated_at = CURRENT_TIMESTAMP WHERE name = ? AND position = ?");
        $stmt->execute([$org['order_index'], $org['name'], $org['position']]);
        $updated++;
    } else {
        // Insert new
        $stmt = $pdo->prepare("INSERT INTO organization_structure (name, position, order_index) VALUES (?, ?, ?)");
        $stmt->execute([$org['name'], $org['position'], $org['order_index']]);
        $inserted++;
    }
    
    echo "   ✓ {$org['name']} - {$org['position']}\n";
}

echo "\n=== Import Selesai ===\n";
echo "Inserted: $inserted records\n";
echo "Updated: $updated records\n";
echo "Total: " . count($organization) . " records\n";



