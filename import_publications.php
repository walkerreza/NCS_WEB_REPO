<?php
/**
 * Import Publications and Lab SINTA Profiles
 */

require_once __DIR__ . '/config/database.php';

$db = db();
$pdo = $db->getConnection();

echo "=== Creating Publications Tables ===\n\n";

// Create publications table
$pdo->exec("DROP TABLE IF EXISTS publications CASCADE");
$pdo->exec("
CREATE TABLE publications (
    id SERIAL PRIMARY KEY,
    lab_id INT NOT NULL,
    lab_name VARCHAR(255) NOT NULL,
    title TEXT NOT NULL,
    year INT NOT NULL,
    citations INT DEFAULT 0,
    url VARCHAR(500),
    sinta_id VARCHAR(100),
    order_index INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
echo "✓ Table 'publications' created\n";

// Create lab_sinta_profiles table
$pdo->exec("DROP TABLE IF EXISTS lab_sinta_profiles CASCADE");
$pdo->exec("
CREATE TABLE lab_sinta_profiles (
    id SERIAL PRIMARY KEY,
    lab_name VARCHAR(255) NOT NULL,
    kepala_lab VARCHAR(255) NOT NULL,
    sinta_url VARCHAR(500) NOT NULL,
    total_publications INT DEFAULT 0,
    icon VARCHAR(50),
    order_index INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
echo "✓ Table 'lab_sinta_profiles' created\n\n";

// Insert lab SINTA profiles
$labs = [
    ['Laboratorium Jaringan dan Keamanan Siber', 'Erfan Rohadi, ST., M.Eng., Ph.D.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/5983891', 184, 'shield-alt'],
    ['Laboratorium Rekayasa Perangkat Lunak', 'Imam Fahrur Rozi, ST., MT.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/6005739', 90, 'code'],
    ['Laboratorium Visi Cerdas dan Sistem Cerdas', 'Dr. Ulla Delfana Rosiani, ST., MT.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/5976576', 79, 'brain'],
    ['Laboratorium Sistem Informasi', 'Dr. Eng. Banni Satria Andoko, S. Kom., M.MSI.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/6090920', 50, 'database'],
    ['Laboratorium Analisa Bisnis', 'Dr. Rakhmat Arianto, S.ST., M.Kom.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/6753831', 70, 'chart-line'],
    ['Laboratorium Teknologi Data', 'Yoppy Yunhasnawa, S.ST., M.Sc.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/6681213', 53, 'server'],
    ['Laboratorium Multimedia dan Perangkat Bergerak', 'Dimas Wahyu Wibowo, ST., MT.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/6162521', 80, 'mobile-alt'],
    ['Laboratorium Informatika Terapan', 'Ir. Yan Watequlis Syaifuddin, ST., M.MT., Ph. D.', 'https://sinta.kemdiktisaintek.go.id/authors/profile/5975696', 155, 'laptop-code'],
];

echo "Inserting Lab SINTA Profiles...\n";
$stmt = $pdo->prepare("INSERT INTO lab_sinta_profiles (lab_name, kepala_lab, sinta_url, total_publications, icon, order_index) VALUES (?, ?, ?, ?, ?, ?)");
foreach ($labs as $i => $lab) {
    $stmt->execute([$lab[0], $lab[1], $lab[2], $lab[3], $lab[4], $i + 1]);
    echo "  ✓ {$lab[0]}\n";
}

// Insert publications
$publications = [
    // Lab 1: Jaringan dan Keamanan Siber
    [1, 'Laboratorium Jaringan dan Keamanan Siber', 'Variations in chlorophyll-a concentration and the impact on Sardinella lemuru catches in Bali Strait, Indonesia', 2010, 149],
    [1, 'Laboratorium Jaringan dan Keamanan Siber', 'Implementation IoT in system monitoring hydroponic plant water circulation and control', 2018, 55],
    [1, 'Laboratorium Jaringan dan Keamanan Siber', 'Sistem Monitoring Budidaya Ikan Lele Berbasis Internet Of Things Menggunakan Raspberry Pi', 2018, 46],
    [1, 'Laboratorium Jaringan dan Keamanan Siber', 'Internet of Things integration in smart grid', 2018, 33],
    
    // Lab 2: Rekayasa Perangkat Lunak
    [2, 'Laboratorium Rekayasa Perangkat Lunak', 'Implementasi opinion mining (analisis sentimen) untuk ekstraksi data opini publik pada perguruan tinggi', 2012, 211],
    [2, 'Laboratorium Rekayasa Perangkat Lunak', 'Pengembangan sistem penunjang keputusan penentuan ukt mahasiswa dengan menggunakan metode moora studi kasus politeknik negeri malang', 2017, 72],
    [2, 'Laboratorium Rekayasa Perangkat Lunak', 'Pengembangan Aplikasi Analisis Sentimen Twitter Menggunakan Metode Naïve Bayes Classifier (Studi Kasus SAMSAT Kota Malang)', 2018, 39],
    [2, 'Laboratorium Rekayasa Perangkat Lunak', 'Developing vocabulary card base on Augmented Reality (AR) for learning English', 2021, 34],
    
    // Lab 3: Visi Cerdas dan Sistem Cerdas
    [3, 'Laboratorium Visi Cerdas dan Sistem Cerdas', 'Pemanfaatan Wireshark untuk Sniffing Komunikasi Data Berprotokol HTTP pada Jaringan Internet', 2021, 50],
    [3, 'Laboratorium Visi Cerdas dan Sistem Cerdas', 'Segmentasi berbasis k-means pada deteksi citra penyakit daun tanaman jagung', 2020, 31],
    [3, 'Laboratorium Visi Cerdas dan Sistem Cerdas', 'Klasifikasi Jenis Kelamin Pada Citra Wajah Menggunakan Metode Naive Bayes', 2018, 30],
    [3, 'Laboratorium Visi Cerdas dan Sistem Cerdas', 'Sistem Pengambil Keputusan Rekomendasi Lokasi Wisata Malang Raya Dengan Metode MOORA', 2021, 20],
    
    // Lab 4: Sistem Informasi
    [4, 'Laboratorium Sistem Informasi', 'Improving English reading for EFL readers with reviewing kit-build concept map', 2020, 64],
    [4, 'Laboratorium Sistem Informasi', 'An analysis of concept mapping style in EFL reading comprehension from the viewpoint of paragraph structure of text', 2019, 11],
    [4, 'Laboratorium Sistem Informasi', 'A Preliminary Study: Toulmin Arguments in English Reading Comprehension for English as Foreign Language Students', 2021, 10],
    [4, 'Laboratorium Sistem Informasi', 'Evaluating the kit-build concept mapping process using sub-map scoring.', 2024, 9],
    
    // Lab 5: Analisa Bisnis
    [5, 'Laboratorium Analisa Bisnis', 'Klasifikasi Sentiment Analysis Pada Komentar Peserta Diklat Menggunakan Metode K-Nearest Neighbor', 2019, 41],
    [5, 'Laboratorium Analisa Bisnis', 'Aplikasi Penentuan Dosen Penguji Skripsi Menggunakan Metode TF-IDF dan Vector Space Model', 2017, 40],
    [5, 'Laboratorium Analisa Bisnis', 'Penerapan Metode K-Means dan C4. 5 Untuk prediksi penderita diabetes', 2020, 22],
    [5, 'Laboratorium Analisa Bisnis', 'Detection of immovable objects on visually impaired people walking aids', 2019, 19],
    
    // Lab 6: Teknologi Data
    [6, 'Laboratorium Teknologi Data', 'Sistem Prediksi Penjualan Frozen Food dengan Metode Monte Carlo (Studi Kasus: Supermama Frozen Food)', 2022, 29],
    [6, 'Laboratorium Teknologi Data', 'Web application implementation of Android programming learning assistance system and its evaluations', 2021, 25],
    [6, 'Laboratorium Teknologi Data', 'Pengembangan Sistem Pakar Untuk Diagnosa Penyakit Kulit Pada Manusia Menggunakan Metode Naive Bayes', 2019, 19],
    [6, 'Laboratorium Teknologi Data', 'Implementasi metode K-Means, DBSCAN, dan MeanShift untuk analisis jenis ancaman jaringan pada intrusion detection system', 2022, 16],
    
    // Lab 7: Multimedia dan Perangkat Bergerak
    [7, 'Laboratorium Multimedia dan Perangkat Bergerak', 'Rancang Bangun Chatbot Untuk Meningkatkan Performa Bisnis', 2019, 79],
    [7, 'Laboratorium Multimedia dan Perangkat Bergerak', 'Analisis Metode Cosine Similarity Pada Aplikasi Ujian Online Esai Otomatis (Studi Kasus JTI Polinema)', 2021, 28],
    [7, 'Laboratorium Multimedia dan Perangkat Bergerak', 'Decision Tree Berbasis SMOTE dalam Analisis Sentimen Penggunaan Artificial Intelligence untuk Skripsi', 2024, 19],
    [7, 'Laboratorium Multimedia dan Perangkat Bergerak', 'Penerapan Metode Promethee Dalam Seleksi Beasiswa Mahasiswa Berprestasi', 2017, 16],
    
    // Lab 8: Informatika Terapan
    [8, 'Laboratorium Informatika Terapan', 'A proposal of Android programming learning assistant system with implementation of basic application learning', 2020, 45],
    [8, 'Laboratorium Informatika Terapan', 'A proposal of grammar-concept understanding problem in Java programming learning assistant system', 2021, 38],
    [8, 'Laboratorium Informatika Terapan', 'Implementasi Analisis Clustering Dan Sentimen Data Twitter Pada Opini Wisata Pantai Menggunakan Metode K-Means', 2018, 37],
    [8, 'Laboratorium Informatika Terapan', 'Twitter data mining for sentiment analysis on peoples feedback against government public policy', 2017, 27],
];

echo "\nInserting Publications...\n";
$stmt = $pdo->prepare("INSERT INTO publications (lab_id, lab_name, title, year, citations, order_index) VALUES (?, ?, ?, ?, ?, ?)");
$currentLab = 0;
$order = 0;
foreach ($publications as $pub) {
    if ($pub[0] != $currentLab) {
        $currentLab = $pub[0];
        $order = 0;
    }
    $order++;
    $stmt->execute([$pub[0], $pub[1], $pub[2], $pub[3], $pub[4], $order]);
}
echo "  ✓ " . count($publications) . " publications inserted\n";

echo "\n=== Import Complete ===\n";
echo "Lab Profiles: " . count($labs) . "\n";
echo "Publications: " . count($publications) . "\n";



