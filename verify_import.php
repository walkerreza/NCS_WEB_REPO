<?php
/**
 * Verification Script for Imported Data
 */

require_once __DIR__ . '/config/database.php';

$db = db();

echo "=== Verification Report ===\n\n";

// Settings
$settings = $db->fetchAll("SELECT key, SUBSTRING(value, 1, 80) as preview FROM settings WHERE key IN ('visi', 'misi', 'tujuan')");
echo "Settings (visi, misi, tujuan):\n";
foreach ($settings as $s) {
    echo "  - {$s['key']}: {$s['preview']}...\n";
}

// Focus Areas
$focus = $db->fetchAll('SELECT COUNT(*) as count FROM focus_areas');
echo "\nFocus Areas: {$focus[0]['count']} records\n";
$focusList = $db->fetchAll('SELECT title FROM focus_areas ORDER BY order_index');
foreach ($focusList as $f) {
    echo "  - {$f['title']}\n";
}

// Services
$services = $db->fetchAll('SELECT category, COUNT(*) as count FROM services GROUP BY category ORDER BY category');
echo "\nServices:\n";
foreach ($services as $s) {
    echo "  - {$s['category']}: {$s['count']} records\n";
}

// Documents
$docs = $db->fetchAll('SELECT category, COUNT(*) as count FROM documents GROUP BY category ORDER BY category');
echo "\nDocuments:\n";
foreach ($docs as $d) {
    echo "  - {$d['category']}: {$d['count']} records\n";
}

// Sample pengabdian documents
echo "\nSample Pengabdian Documents (last 5):\n";
$sampleDocs = $db->fetchAll("SELECT title, author, publication_date FROM documents WHERE category = 'pengabdian' ORDER BY id DESC LIMIT 5");
foreach ($sampleDocs as $doc) {
    $shortTitle = strlen($doc['title']) > 60 ? substr($doc['title'], 0, 60) . '...' : $doc['title'];
    echo "  - [{$doc['publication_date']}] {$shortTitle}\n";
}

// External Links
$links = $db->fetchAll('SELECT COUNT(*) as count FROM external_links');
echo "\nExternal Links: {$links[0]['count']} records\n";
$linksList = $db->fetchAll('SELECT title, url FROM external_links ORDER BY order_index LIMIT 10');
foreach ($linksList as $l) {
    echo "  - {$l['title']}: {$l['url']}\n";
}

echo "\n=== Verification Complete ===\n";

