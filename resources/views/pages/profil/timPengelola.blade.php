@extends('layouts.frontend')

@section('title', 'Detail Tim Pengelola')
@section('meta_description', 'Detail Tim Pengelola Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-600 dark:text-gray-400">Profil</li>
                <li class="text-gray-500">/</li>
                <li><a href="{{ route('profil.struktur') }}" class="text-blue-600 hover:text-blue-800 no-underline">Struktur Organisasi</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">{{ $member['name'] ?? 'Tim Pengelola' }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Profile Header -->
<section class="py-12 bg-gradient-to-br {{ $member['gradient'] ?? 'from-blue-600 to-blue-800' }} text-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="text-center" data-aos="zoom-in">
                <div class="w-40 h-40 rounded-full bg-white/20 backdrop-blur-sm inline-flex items-center justify-center mx-auto mb-6 text-7xl border-4 border-white/30">
                    <i class="bi bi-person"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-3">{{ $member['name'] ?? 'Nama Anggota Tim' }}</h1>
                <p class="text-xl mb-2 text-white/90">{{ $member['position'] ?? 'Posisi' }}</p>
                <p class="text-white/80">NIP: {{ $member['nip'] ?? '000000000' }}</p>
                
                <!-- Social Links -->
                <div class="flex justify-center gap-4 mt-6">
                    <a href="mailto:{{ $member['email'] ?? 'email@polinema.ac.id' }}" 
                       class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm inline-flex items-center justify-center transition-all duration-300">
                        <i class="bi bi-envelope text-xl"></i>
                    </a>
                    <a href="{{ $member['linkedin'] ?? '#' }}" 
                       target="_blank"
                       class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm inline-flex items-center justify-center transition-all duration-300">
                        <i class="bi bi-linkedin text-xl"></i>
                    </a>
                    <a href="{{ $member['scholar'] ?? '#' }}" 
                       target="_blank"
                       class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm inline-flex items-center justify-center transition-all duration-300">
                        <i class="bi bi-mortarboard text-xl"></i>
                    </a>
                    <a href="{{ $member['website'] ?? '#' }}" 
                       target="_blank"
                       class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm inline-flex items-center justify-center transition-all duration-300">
                        <i class="bi bi-globe text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profile Content -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Biodata -->
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl mb-6" data-aos="fade-up">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-6 flex items-center">
                            <i class="bi bi-person-badge mr-3 text-blue-600"></i>Biodata
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h6 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Nama Lengkap</h6>
                                <p class="text-gray-900 dark:text-white">{{ $member['name'] ?? 'Dr. Nama Lengkap, M.T.' }}</p>
                            </div>
                            <div>
                                <h6 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">NIP</h6>
                                <p class="text-gray-900 dark:text-white">{{ $member['nip'] ?? '197001011999031001' }}</p>
                            </div>
                            <div>
                                <h6 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Jabatan</h6>
                                <p class="text-gray-900 dark:text-white">{{ $member['position'] ?? 'Kepala Laboratorium' }}</p>
                            </div>
                            <div>
                                <h6 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Pendidikan Terakhir</h6>
                                <p class="text-gray-900 dark:text-white">{{ $member['education'] ?? 'S3 Teknik Informatika' }}</p>
                            </div>
                            <div>
                                <h6 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Email</h6>
                                <p class="text-gray-900 dark:text-white">{{ $member['email'] ?? 'email@polinema.ac.id' }}</p>
                            </div>
                            <div>
                                <h6 class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Telepon</h6>
                                <p class="text-gray-900 dark:text-white">{{ $member['phone'] ?? '(0341) 404424' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expertise -->
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl mb-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-6 flex items-center">
                            <i class="bi bi-award mr-3 text-green-600"></i>Bidang Keahlian
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach($member['expertise'] ?? ['Cyber Security', 'Network Security', 'Penetration Testing'] as $skill)
                            <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $skill }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Research -->
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl mb-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-6 flex items-center">
                            <i class="bi bi-journal-text mr-3 text-yellow-600"></i>Penelitian Terbaru
                        </h3>
                        <div class="space-y-4">
                            @foreach($member['research'] ?? [] as $index => $research)
                            <div class="p-4 bg-gray-50 dark:bg-slate-800 rounded-lg hover:shadow-md transition-shadow">
                                <h6 class="font-bold text-gray-900 dark:text-white mb-2">{{ $research['title'] ?? 'Judul Penelitian '.($index+1) }}</h6>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ $research['year'] ?? date('Y') }} • {{ $research['journal'] ?? 'Jurnal Publikasi' }}</p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">{{ $research['abstract'] ?? 'Deskripsi singkat penelitian tentang keamanan siber dan teknologi informasi.' }}</p>
                            </div>
                            @endforeach
                            
                            @if(empty($member['research']))
                            @for($i = 1; $i <= 3; $i++)
                            <div class="p-4 bg-gray-50 dark:bg-slate-800 rounded-lg hover:shadow-md transition-shadow">
                                <h6 class="font-bold text-gray-900 dark:text-white mb-2">Implementasi Security Framework pada Cloud Computing</h6>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ date('Y') - $i }} • International Journal of Cyber Security</p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Penelitian tentang implementasi kerangka keamanan pada infrastruktur cloud computing untuk meningkatkan proteksi data.</p>
                            </div>
                            @endfor
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Publications -->
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl mb-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-6 flex items-center">
                            <i class="bi bi-book mr-3 text-red-600"></i>Publikasi
                        </h3>
                        <ul class="space-y-3">
                            @foreach($member['publications'] ?? [] as $pub)
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">{{ $pub }}</span>
                            </li>
                            @endforeach
                            
                            @if(empty($member['publications']))
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">Advanced Encryption Techniques in Modern Networks (2023)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">Machine Learning for Intrusion Detection Systems (2022)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">Blockchain Security in IoT Environments (2021)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">Zero Trust Architecture Implementation (2020)</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Stats -->
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl mb-6" data-aos="fade-up">
                    <div class="p-6">
                        <h5 class="text-lg font-bold mb-4">Statistik</h5>
                        <div class="space-y-4">
                            <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-1">{{ $member['stats']['research_count'] ?? '15' }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Penelitian</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                                <div class="text-3xl font-bold text-green-600 dark:text-green-400 mb-1">{{ $member['stats']['publication_count'] ?? '25' }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Publikasi</div>
                            </div>
                            <div class="text-center p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
                                <div class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mb-1">{{ $member['stats']['h_index'] ?? '12' }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">H-Index</div>
                            </div>
                            <div class="text-center p-4 bg-red-50 dark:bg-red-900/20 rounded-lg">
                                <div class="text-3xl font-bold text-red-600 dark:text-red-400 mb-1">{{ $member['stats']['citations'] ?? '350' }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Sitasi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certifications -->
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl mb-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-6">
                        <h5 class="text-lg font-bold mb-4 flex items-center">
                            <i class="bi bi-patch-check mr-2 text-blue-600"></i>Sertifikasi
                        </h5>
                        <ul class="space-y-3 text-sm">
                            @foreach($member['certifications'] ?? [] as $cert)
                            <li class="flex items-start">
                                <i class="bi bi-award text-yellow-500 mr-2 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">{{ $cert }}</span>
                            </li>
                            @endforeach
                            
                            @if(empty($member['certifications']))
                            <li class="flex items-start">
                                <i class="bi bi-award text-yellow-500 mr-2 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">Certified Ethical Hacker (CEH)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-award text-yellow-500 mr-2 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">CISSP</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-award text-yellow-500 mr-2 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">CompTIA Security+</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-award text-yellow-500 mr-2 mt-1 flex-shrink-0"></i>
                                <span class="text-gray-700 dark:text-gray-300">ISO 27001 Lead Auditor</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Contact Card -->
                <div class="card border-0 shadow-sm bg-gradient-to-br {{ $member['gradient'] ?? 'from-blue-600 to-blue-800' }} text-white rounded-xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-6">
                        <h5 class="text-lg font-bold mb-4">Hubungi</h5>
                        <div class="space-y-3 text-sm">
                            <a href="mailto:{{ $member['email'] ?? 'email@polinema.ac.id' }}" class="flex items-start text-white hover:text-yellow-300 transition-colors no-underline">
                                <i class="bi bi-envelope mr-2 mt-1"></i>
                                <span>{{ $member['email'] ?? 'email@polinema.ac.id' }}</span>
                            </a>
                            <a href="tel:{{ $member['phone'] ?? '(0341) 404424' }}" class="flex items-start text-white hover:text-yellow-300 transition-colors no-underline">
                                <i class="bi bi-telephone mr-2 mt-1"></i>
                                <span>{{ $member['phone'] ?? '(0341) 404424' }}</span>
                            </a>
                            <div class="flex items-start text-white">
                                <i class="bi bi-geo-alt mr-2 mt-1"></i>
                                <span>Lab Network & Cyber Security<br>Gedung JTI, Polinema</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-8" data-aos="fade-up">
            <a href="{{ route('profil.struktur') }}" class="btn-outline-light border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white inline-flex items-center px-6 py-3 rounded-lg transition-all duration-300">
                <i class="bi bi-arrow-left mr-2"></i>Kembali ke Struktur Organisasi
            </a>
        </div>
    </div>
</section>
@endsection

