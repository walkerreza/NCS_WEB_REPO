<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Public Routes
|--------------------------------------------------------------------------
| Routes untuk halaman publik website Lab NCS
*/

// Beranda
Route::get('/', function () {
    return view('pages.beranda');
})->name('beranda');

// Profil Routes
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/visi-misi', function () {
        return view('pages.profil.visi-misi');
    })->name('visi-misi');
    
    Route::get('/logo', function () {
        return view('pages.profil.logo');
    })->name('logo');
    
    Route::get('/struktur', function () {
        return view('pages.profil.struktur');
    })->name('struktur');
    
    Route::get('/tim-pengelola/{slug}', function ($slug) {
        // Dummy data untuk setiap anggota tim
        $members = [
            'kepala-laboratorium' => [
                'name' => 'Dr. Budi Harijanto, M.T.',
                'position' => 'Kepala Laboratorium',
                'nip' => '197001011999031001',
                'education' => 'S3 Teknik Informatika - ITB',
                'email' => 'budi.harijanto@polinema.ac.id',
                'phone' => '(0341) 404424 ext. 101',
                'linkedin' => 'https://linkedin.com/in/budi-harijanto',
                'scholar' => 'https://scholar.google.com',
                'website' => 'https://budi-harijanto.com',
                'gradient' => 'from-blue-600 to-blue-800',
                'expertise' => [
                    'Cyber Security', 
                    'Network Security', 
                    'Penetration Testing',
                    'Security Architecture',
                    'Cryptography'
                ],
                'research' => [
                    [
                        'title' => 'Advanced Intrusion Detection Using Machine Learning',
                        'year' => '2023',
                        'journal' => 'IEEE Transactions on Information Forensics and Security',
                        'abstract' => 'Penelitian tentang penggunaan machine learning untuk deteksi intrusi pada jaringan komputer dengan akurasi tinggi.'
                    ],
                    [
                        'title' => 'Blockchain-Based Security Framework for IoT',
                        'year' => '2022',
                        'journal' => 'Journal of Network and Computer Applications',
                        'abstract' => 'Implementasi kerangka keamanan berbasis blockchain untuk meningkatkan keamanan perangkat IoT.'
                    ],
                    [
                        'title' => 'Zero Trust Architecture in Cloud Computing',
                        'year' => '2021',
                        'journal' => 'ACM Computing Surveys',
                        'abstract' => 'Analisis implementasi zero trust architecture pada infrastruktur cloud computing.'
                    ]
                ],
                'publications' => [
                    'Advanced Encryption Techniques in Modern Networks (2023)',
                    'Machine Learning for Intrusion Detection Systems (2022)',
                    'Blockchain Security in IoT Environments (2021)',
                    'Zero Trust Architecture Implementation (2020)',
                    'Secure Software Development Lifecycle (2019)'
                ],
                'certifications' => [
                    'Certified Ethical Hacker (CEH)',
                    'CISSP - Certified Information Systems Security Professional',
                    'CompTIA Security+',
                    'ISO 27001 Lead Auditor',
                    'Offensive Security Certified Professional (OSCP)'
                ],
                'stats' => [
                    'research_count' => '25',
                    'publication_count' => '40',
                    'h_index' => '18',
                    'citations' => '650'
                ]
            ],
            'koordinator-penelitian' => [
                'name' => 'Dr. Siti Nurmaini, S.T., M.T.',
                'position' => 'Koordinator Penelitian',
                'nip' => '198203152006042001',
                'education' => 'S3 Keamanan Informasi - UGM',
                'email' => 'siti.nurmaini@polinema.ac.id',
                'phone' => '(0341) 404424 ext. 102',
                'linkedin' => 'https://linkedin.com/in/siti-nurmaini',
                'scholar' => 'https://scholar.google.com',
                'website' => 'https://siti-nurmaini.com',
                'gradient' => 'from-green-600 to-green-800',
                'expertise' => [
                    'Cryptography', 
                    'Network Forensics', 
                    'Malware Analysis',
                    'Secure Coding',
                    'Risk Management'
                ],
                'research' => [
                    [
                        'title' => 'Advanced Cryptographic Protocols for Secure Communications',
                        'year' => '2023',
                        'journal' => 'International Journal of Information Security',
                        'abstract' => 'Pengembangan protokol kriptografi untuk komunikasi aman pada jaringan terdistribusi.'
                    ],
                    [
                        'title' => 'Digital Forensics in Cloud Environment',
                        'year' => '2022',
                        'journal' => 'Forensic Science International: Digital Investigation',
                        'abstract' => 'Metodologi forensik digital untuk investigasi insiden keamanan di lingkungan cloud.'
                    ]
                ],
                'publications' => [
                    'Modern Cryptography: Theory and Practice (2023)',
                    'Network Forensics Handbook (2022)',
                    'Malware Detection and Analysis (2021)',
                    'Secure Software Engineering (2020)'
                ],
                'certifications' => [
                    'Certified Information Security Manager (CISM)',
                    'GIAC Security Essentials (GSEC)',
                    'Certified Forensic Analyst (CFA)',
                    'ISO 27001 Lead Implementer'
                ],
                'stats' => [
                    'research_count' => '20',
                    'publication_count' => '32',
                    'h_index' => '15',
                    'citations' => '480'
                ]
            ],
            'koordinator-pengabdian' => [
                'name' => 'Ahmad Fauzi, S.Kom., M.Kom.',
                'position' => 'Koordinator Pengabdian',
                'nip' => '198505102010121003',
                'education' => 'S2 Teknik Informatika - ITS',
                'email' => 'ahmad.fauzi@polinema.ac.id',
                'phone' => '(0341) 404424 ext. 103',
                'linkedin' => 'https://linkedin.com/in/ahmad-fauzi',
                'scholar' => 'https://scholar.google.com',
                'website' => 'https://ahmad-fauzi.com',
                'gradient' => 'from-yellow-500 to-orange-500',
                'expertise' => [
                    'Web Security', 
                    'Application Security', 
                    'Security Awareness Training',
                    'OWASP Top 10',
                    'DevSecOps'
                ],
                'research' => [
                    [
                        'title' => 'Web Application Security Testing Framework',
                        'year' => '2023',
                        'journal' => 'Journal of Information Security and Applications',
                        'abstract' => 'Framework untuk pengujian keamanan aplikasi web berdasarkan OWASP Top 10.'
                    ],
                    [
                        'title' => 'Community Empowerment through Cybersecurity Training',
                        'year' => '2022',
                        'journal' => 'International Journal of Community Service',
                        'abstract' => 'Program pemberdayaan masyarakat melalui pelatihan kesadaran keamanan siber.'
                    ]
                ],
                'publications' => [
                    'Web Security Best Practices (2023)',
                    'OWASP Security Guide (2022)',
                    'DevSecOps Implementation (2021)',
                    'Security Awareness Training Manual (2020)'
                ],
                'certifications' => [
                    'Certified Secure Software Lifecycle Professional (CSSLP)',
                    'OWASP Certified Secure Web Developer',
                    'CompTIA CySA+',
                    'AWS Security Specialty'
                ],
                'stats' => [
                    'research_count' => '12',
                    'publication_count' => '18',
                    'h_index' => '9',
                    'citations' => '220'
                ]
            ],
            'laboran' => [
                'name' => 'Rina Kusumawati, A.Md.',
                'position' => 'Laboran',
                'nip' => '199012152015032002',
                'education' => 'D3 Teknik Komputer - Polinema',
                'email' => 'rina.kusumawati@polinema.ac.id',
                'phone' => '(0341) 404424 ext. 104',
                'linkedin' => 'https://linkedin.com/in/rina-kusumawati',
                'scholar' => '',
                'website' => '',
                'gradient' => 'from-red-600 to-red-800',
                'expertise' => [
                    'Lab Management', 
                    'Network Administration', 
                    'System Administration',
                    'Hardware Maintenance',
                    'Technical Support'
                ],
                'research' => [],
                'publications' => [
                    'Best Practices in Laboratory Management (2022)',
                    'Network Infrastructure Setup Guide (2021)',
                    'IT Support Documentation (2020)'
                ],
                'certifications' => [
                    'CompTIA A+',
                    'Network+ Certification',
                    'Cisco CCNA',
                    'Microsoft Certified: Azure Administrator'
                ],
                'stats' => [
                    'research_count' => '3',
                    'publication_count' => '5',
                    'h_index' => '2',
                    'citations' => '15'
                ]
            ]
        ];

        // Jika slug tidak ditemukan, redirect ke struktur organisasi
        if (!isset($members[$slug])) {
            return redirect()->route('profil.struktur');
        }

        $member = $members[$slug];
        
        return view('pages.profil.timPengelola', compact('member'));
    })->name('tim-pengelola');
});

// Galeri & Agenda
Route::get('/galeri', function () {
    return view('pages.galeri');
})->name('galeri');

// Arsip Routes
Route::prefix('arsip')->name('arsip.')->group(function () {
    Route::get('/penelitian', function () {
        return view('pages.arsip.penelitian');
    })->name('penelitian');
    
    Route::get('/pengabdian', function () {
        return view('pages.arsip.pengabdian');
    })->name('pengabdian');
});

// Layanan Routes
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/sarana-prasarana', function () {
        return view('pages.layanan.sarana');
    })->name('sarana');
    
    Route::get('/konsultatif', function () {
        return view('pages.layanan.konsultatif');
    })->name('konsultatif');
});

// Link
Route::get('/link', function () {
    return view('pages.link');
})->name('link');

/*
|--------------------------------------------------------------------------
| Admin/Dashboard Routes
|--------------------------------------------------------------------------
| Routes untuk admin dashboard (memerlukan autentikasi)
*/

Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.Admin.dashboard');
    })->name('dashboard');
    
    Route::get('/visi-misi', function () {
        return view('pages.Admin.VisiMisi');
    })->name('visi-misi');

    Route::get('/logo', function () {
        return view('pages.Admin.logo');
    })->name('logo');

    Route::get('/struktur-organisasi', function () {
        return view('pages.Admin.StrukturOrg');
    })->name('struktur-organisasi');

    Route::get('/galeri', function () {
        return view('pages.Admin.galeri');
    })->name('galeri');

    Route::get('/penelitian', function () {
        return view('pages.Admin.penelitian');
    })->name('penelitian');

    Route::get('/pengabdian', function () {
        return view('pages.Admin.pengabdian');
    })->name('pengabdian');

    Route::get('/sarana-prasarana', function () {
        return view('pages.Admin.Sarpras');
    })->name('sarana-prasarana');

    Route::get('/konsul', function () {
        return view('pages.Admin.konsul');
    })->name('konsul');

    Route::get('/link', function () {
        return view('pages.Admin.link');
    })->name('link');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
