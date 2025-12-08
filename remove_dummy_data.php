<?php
/**
 * Script to Remove Dummy/Sample Data from Database
 * This removes the placeholder data inserted from schema.sql
 */

require_once __DIR__ . '/config/database.php';

$db = db();
$pdo = $db->getConnection();

echo "=== Menghapus Data Dummy ===\n\n";

$deleted = [];

// 1. Remove dummy team members
echo "[1] Menghapus Team Members dummy...\n";
$stmt = $pdo->prepare("DELETE FROM team_members WHERE name LIKE 'Member %'");
$stmt->execute();
$deleted['team_members'] = $stmt->rowCount();
echo "   ✓ {$deleted['team_members']} records dihapus\n";

// 2. Remove dummy organization structure
echo "\n[2] Menghapus Organization Structure dummy...\n";
$stmt = $pdo->prepare("DELETE FROM organization_structure WHERE name IN ('Dr. Example Name, M.T.', 'John Doe, M.Kom.', 'Jane Smith, M.Cs.')");
$stmt->execute();
$deleted['organization'] = $stmt->rowCount();
echo "   ✓ {$deleted['organization']} records dihapus\n";

// 3. Remove dummy services (old sample ones - keep imported ones)
echo "\n[3] Menghapus Services dummy...\n";
$dummyServices = [
    'Ruang Server',
    'Lab Komputer', 
    'Perangkat Jaringan',
    'Konsultasi Keamanan Jaringan',
    'Pelatihan Cyber Security',
    'Pengujian Penetrasi'
];
$placeholders = implode(',', array_fill(0, count($dummyServices), '?'));
$stmt = $pdo->prepare("DELETE FROM services WHERE title IN ($placeholders)");
$stmt->execute($dummyServices);
$deleted['services'] = $stmt->rowCount();
echo "   ✓ {$deleted['services']} records dihapus\n";

// 4. Remove dummy focus areas (old sample ones - keep lab focus areas)
echo "\n[4] Menghapus Focus Areas dummy...\n";
$dummyFocusAreas = [
    'Network Security',
    'Penetration Testing',
    'Digital Forensics',
    'Cryptography',
    'Malware Analysis',
    'IoT Security'
];
$placeholders = implode(',', array_fill(0, count($dummyFocusAreas), '?'));
$stmt = $pdo->prepare("DELETE FROM focus_areas WHERE title IN ($placeholders)");
$stmt->execute($dummyFocusAreas);
$deleted['focus_areas'] = $stmt->rowCount();
echo "   ✓ {$deleted['focus_areas']} records dihapus\n";

// 5. Remove dummy roadmap
echo "\n[5] Menghapus Roadmap dummy...\n";
$dummyRoadmap = [
    'Pendirian Laboratorium',
    'Pengadaan Infrastruktur',
    'Program Sertifikasi',
    'Kerjasama Industri',
    'Pengembangan CTF Platform',
    'Research Publication',
    'Security Operations Center',
    'International Collaboration'
];
$placeholders = implode(',', array_fill(0, count($dummyRoadmap), '?'));
$stmt = $pdo->prepare("DELETE FROM roadmap WHERE title IN ($placeholders)");
$stmt->execute($dummyRoadmap);
$deleted['roadmap'] = $stmt->rowCount();
echo "   ✓ {$deleted['roadmap']} records dihapus\n";

// 6. Remove dummy documents (sample penelitian with 'Tim Peneliti NCS Lab' author)
echo "\n[6] Menghapus Documents dummy...\n";
$stmt = $pdo->prepare("DELETE FROM documents WHERE author IN ('Tim Peneliti NCS Lab', 'Tim Pengabdian NCS Lab')");
$stmt->execute();
$deleted['documents'] = $stmt->rowCount();
echo "   ✓ {$deleted['documents']} records dihapus\n";

// 7. Remove dummy agenda
echo "\n[7] Menghapus Agenda dummy...\n";
$dummyAgenda = [
    'Workshop Capture The Flag',
    'Seminar Cyber Security Trends 2025',
    'Pelatihan Penetration Testing',
    'Guest Lecture: Karir di Cybersecurity',
    'Lomba Web Security Competition',
    'Workshop Digital Forensics'
];
$placeholders = implode(',', array_fill(0, count($dummyAgenda), '?'));
$stmt = $pdo->prepare("DELETE FROM agenda WHERE title IN ($placeholders)");
$stmt->execute($dummyAgenda);
$deleted['agenda'] = $stmt->rowCount();
echo "   ✓ {$deleted['agenda']} records dihapus\n";

// 8. Remove duplicate external links (keep imported SINTA links)
echo "\n[8] Menghapus External Links duplicate...\n";
$stmt = $pdo->prepare("DELETE FROM external_links WHERE title = 'SIM PKM'");
$stmt->execute();
$deleted['external_links'] = $stmt->rowCount();
echo "   ✓ {$deleted['external_links']} records dihapus\n";

// Summary
echo "\n=== Penghapusan Selesai ===\n";
$total = array_sum($deleted);
echo "Total: $total records dihapus\n\n";

// Show remaining data
echo "=== Data Tersisa ===\n";
$tables = ['team_members', 'organization_structure', 'services', 'focus_areas', 'roadmap', 'documents', 'agenda', 'external_links'];
foreach ($tables as $table) {
    $count = $db->fetch("SELECT COUNT(*) as count FROM $table")['count'];
    echo "  - $table: $count records\n";
}



