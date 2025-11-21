@extends('layouts.frontend')

@section('title', 'Arsip Pengabdian')
@section('meta_description', 'Arsip Pengabdian Masyarakat Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-600 dark:text-gray-400">Arsip</li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Pengabdian</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Arsip Pengabdian Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-8">
            <div class="md:col-span-8" data-aos="fade-right">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2">Arsip Pengabdian Masyarakat</h1>
                <p class="text-gray-600 dark:text-gray-400">Dokumentasi kegiatan pengabdian kepada masyarakat</p>
            </div>
            <div class="md:col-span-4" data-aos="fade-left">
                <!-- Filter/Search -->
                <div class="flex">
                    <input type="text" class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white" placeholder="Cari dokumen..." id="searchArchive">
                    <button class="btn-primary px-6 py-2 rounded-r-lg" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Archive List -->
        <div class="space-y-4">
            {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
            @for($i = 1; $i <= 8; $i++)
            <div class="archive-card" 
                 data-title="Pelatihan Keamanan Jaringan untuk UMKM {{ $i }}" 
                 data-author="Tim Pengabdian {{ $i }}" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $i * 30 }}">
                <div class="card border-0 shadow-sm hover-lift bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                            <div class="lg:col-span-2 text-center">
                                <div class="file-icon">
                                    <i class="bi bi-file-earmark-pdf text-red-600" style="font-size: 3.5rem;"></i>
                                </div>
                                <small class="text-gray-600 dark:text-gray-400 block mt-2">PDF</small>
                            </div>
                            <div class="lg:col-span-8">
                                <h5 class="text-xl font-bold mb-2">Pelatihan Keamanan Jaringan dan Website untuk UMKM Kota Malang {{ $i }}</h5>
                                <div class="flex flex-wrap gap-4 text-gray-600 dark:text-gray-400 text-sm mb-2">
                                    <span class="inline-flex items-center"><i class="bi bi-people mr-1"></i>Tim Pengabdian Lab NCS</span>
                                    <span class="inline-flex items-center"><i class="bi bi-calendar3 mr-1"></i>{{ date('Y', strtotime('-' . $i*3 . ' months')) }}</span>
                                    <span class="inline-flex items-center"><i class="bi bi-tag mr-1"></i>Pelatihan</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">
                                    Kegiatan pengabdian masyarakat berupa pelatihan tentang keamanan jaringan 
                                    dan website untuk pelaku UMKM di Kota Malang. Materi meliputi dasar-dasar 
                                    keamanan web, SSL/TLS, dan proteksi dari cyber attack.
                                </p>
                                <div class="flex gap-2">
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm">Selesai</span>
                                    <span class="bg-cyan-600 text-white px-3 py-1 rounded-full text-sm">{{ rand(20, 50) }} Peserta</span>
                                </div>
                            </div>
                            <div class="lg:col-span-2 text-center lg:text-right">
                                <div class="flex flex-col gap-2">
                                    <a href="#" class="btn-primary inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm">
                                        <i class="bi bi-download mr-1"></i>Download
                                    </a>
                                    <a href="#" class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm transition-all duration-300">
                                        <i class="bi bi-eye mr-1"></i>Detail
                                    </a>
                                </div>
                                <small class="text-gray-600 dark:text-gray-400 block mt-2">
                                    <i class="bi bi-download mr-1"></i>{{ rand(30, 300) }} unduhan
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav aria-label="Page navigation">
                <ul class="flex items-center gap-2">
                    <li>
                        <a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-400 cursor-not-allowed" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li><a class="px-4 py-2 rounded-lg bg-blue-600 text-white" href="#">1</a></li>
                    <li><a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">2</a></li>
                    <li>
                        <a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection
