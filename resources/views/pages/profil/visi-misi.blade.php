@extends('layouts.frontend')

@section('title', 'Visi & Misi')
@section('meta_description', 'Visi dan Misi Laboratorium Network & Cyber Security Polinema')

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
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Visi & Misi</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Visi Misi Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3">Visi & Misi</h1>
            <p class="text-gray-600 dark:text-gray-400">Arah dan tujuan Lab Network & Cyber Security</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Visi -->
            <div data-aos="fade-right">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-4">
                                <i class="bi bi-eye text-blue-600 dark:text-blue-400" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-0">Visi</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed">
                            Menjadi laboratorium unggulan dalam penelitian dan pengembangan teknologi 
                            keamanan jaringan dan cyber security yang berkontribusi pada peningkatan 
                            keamanan informasi di tingkat nasional dan internasional.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Misi -->
            <div data-aos="fade-left">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-4">
                                <i class="bi bi-bullseye text-green-600 dark:text-green-400" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-0">Misi</h3>
                        </div>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 text-xl flex-shrink-0"></i>
                                <span class="text-gray-600 dark:text-gray-400">Melakukan penelitian inovatif di bidang keamanan jaringan dan cyber security</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 text-xl flex-shrink-0"></i>
                                <span class="text-gray-600 dark:text-gray-400">Mengembangkan kompetensi mahasiswa dan dosen dalam teknologi keamanan informasi</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 text-xl flex-shrink-0"></i>
                                <span class="text-gray-600 dark:text-gray-400">Memberikan layanan konsultasi dan pelatihan keamanan siber kepada masyarakat</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 text-xl flex-shrink-0"></i>
                                <span class="text-gray-600 dark:text-gray-400">Menjalin kerjasama dengan industri dan institusi pendidikan dalam pengembangan teknologi</span>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-3 mt-1 text-xl flex-shrink-0"></i>
                                <span class="text-gray-600 dark:text-gray-400">Berkontribusi dalam peningkatan kesadaran keamanan siber di masyarakat</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Nilai-nilai Laboratorium -->
        <div class="mt-12">
            <div data-aos="fade-up">
                <div class="card border-0 shadow-sm bg-gray-50 dark:bg-slate-800 rounded-xl">
                    <div class="p-8 md:p-12">
                        <h3 class="text-2xl font-bold text-center mb-8">Nilai-Nilai Laboratorium</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                            <div>
                                <div class="mb-4">
                                    <i class="bi bi-lightbulb text-yellow-500" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="text-lg font-bold mb-2">Inovasi</h5>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Selalu mengembangkan solusi baru dan kreatif</p>
                            </div>
                            <div>
                                <div class="mb-4">
                                    <i class="bi bi-people text-blue-600" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="text-lg font-bold mb-2">Kolaborasi</h5>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Bekerja sama untuk hasil terbaik</p>
                            </div>
                            <div>
                                <div class="mb-4">
                                    <i class="bi bi-shield-check text-green-600" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="text-lg font-bold mb-2">Integritas</h5>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Menjunjung tinggi etika dan profesionalisme</p>
                            </div>
                            <div>
                                <div class="mb-4">
                                    <i class="bi bi-graph-up-arrow text-red-600" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="text-lg font-bold mb-2">Keunggulan</h5>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Mengejar standar kualitas tertinggi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
