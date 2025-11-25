@extends('layouts.frontend')

@section('title', 'Struktur Organisasi')
@section('meta_description', 'Struktur Organisasi Lab Network & Cyber Security Polinema')

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
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Struktur Organisasi</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Struktur Organisasi Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3">Struktur Organisasi</h1>
            <p class="text-gray-600 dark:text-gray-400">Tim pengelola Lab Network & Cyber Security</p>
        </div>
        
        <!-- Diagram Struktur Organisasi -->
        <div class="flex justify-center mb-12">
            <div class="w-full lg:w-5/6" data-aos="zoom-in">
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <img src="{{ asset('images/struktur-organisasi.png') }}" 
                             alt="Struktur Organisasi" 
                             class="w-full h-auto rounded-lg"
                             onerror="this.parentElement.innerHTML='<div class=\'text-center text-gray-600 dark:text-gray-400 py-16\'><i class=\'bi bi-diagram-3 mb-4\' style=\'font-size: 4rem;\'></i><p class=\'text-lg mb-2\'>Diagram struktur organisasi belum tersedia</p><p class=\'text-sm\'>Upload file struktur-organisasi.png ke folder public/images/</p></div>'">
                        <div class="text-center mt-4">
                            <a href="{{ asset('images/struktur-organisasi.png') }}" 
                               download 
                               class="btn-primary inline-flex items-center px-6 py-3 rounded-lg">
                                <i class="bi bi-download mr-2"></i>Download Struktur
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Team Members Cards -->
        <div class="mt-8">
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold text-center mb-8">Tim Pengelola</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Kepala Laboratorium -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('profil.tim-pengelola', ['slug' => 'kepala-laboratorium']) }}" class="no-underline block">
                        <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl hover-lift transition-all duration-300">
                            <div class="p-6">
                                <div class="mb-4">
                                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 text-white flex items-center justify-center mx-auto text-5xl">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <h5 class="text-xl font-bold mb-1 text-gray-900 dark:text-white">Dr. Budi Harijanto, M.T.</h5>
                                <p class="text-blue-600 dark:text-blue-400 text-sm font-semibold mb-2">Kepala Laboratorium</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-3">NIP: 197001011999031001</p>
                                <div class="inline-flex items-center text-blue-600 dark:text-blue-400 text-sm font-semibold">
                                    <span>Lihat Detail</span>
                                    <i class="bi bi-arrow-right ml-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Koordinator Penelitian -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('profil.tim-pengelola', ['slug' => 'koordinator-penelitian']) }}" class="no-underline block">
                        <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl hover-lift transition-all duration-300">
                            <div class="p-6">
                                <div class="mb-4">
                                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-green-600 to-green-800 text-white flex items-center justify-center mx-auto text-5xl">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <h5 class="text-xl font-bold mb-1 text-gray-900 dark:text-white">Dr. Siti Nurmaini, S.T., M.T.</h5>
                                <p class="text-green-600 dark:text-green-400 text-sm font-semibold mb-2">Koordinator Penelitian</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-3">NIP: 198203152006042001</p>
                                <div class="inline-flex items-center text-green-600 dark:text-green-400 text-sm font-semibold">
                                    <span>Lihat Detail</span>
                                    <i class="bi bi-arrow-right ml-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Koordinator Pengabdian -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('profil.tim-pengelola', ['slug' => 'koordinator-pengabdian']) }}" class="no-underline block">
                        <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl hover-lift transition-all duration-300">
                            <div class="p-6">
                                <div class="mb-4">
                                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-yellow-500 to-orange-500 text-white flex items-center justify-center mx-auto text-5xl">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <h5 class="text-xl font-bold mb-1 text-gray-900 dark:text-white">Ahmad Fauzi, S.Kom., M.Kom.</h5>
                                <p class="text-yellow-600 dark:text-yellow-400 text-sm font-semibold mb-2">Koordinator Pengabdian</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-3">NIP: 198505102010121003</p>
                                <div class="inline-flex items-center text-yellow-600 dark:text-yellow-400 text-sm font-semibold">
                                    <span>Lihat Detail</span>
                                    <i class="bi bi-arrow-right ml-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Laboran -->
                <div data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('profil.tim-pengelola', ['slug' => 'laboran']) }}" class="no-underline block">
                        <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl hover-lift transition-all duration-300">
                            <div class="p-6">
                                <div class="mb-4">
                                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-red-600 to-red-800 text-white flex items-center justify-center mx-auto text-5xl">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <h5 class="text-xl font-bold mb-1 text-gray-900 dark:text-white">Rina Kusumawati, A.Md.</h5>
                                <p class="text-red-600 dark:text-red-400 text-sm font-semibold mb-2">Laboran</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-3">NIP: 199012152015032002</p>
                                <div class="inline-flex items-center text-red-600 dark:text-red-400 text-sm font-semibold">
                                    <span>Lihat Detail</span>
                                    <i class="bi bi-arrow-right ml-1"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
